<?php


namespace App\Http\Controllers\Admin;


use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Image;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'gender' => 'required'
        ]);
        if ($request->image) {

            $image = Image::make($request->image)->encode('png');
            $image->save('uploads/users/'.$request->image->hashName(),(string)$image);
            $request_data['image'] = $request->image->hashName();
        }


        // $request->merge(['password' => bcrypt($request->password)]);

        // $admin = Admin::create($request->all());
        $admin = User::create([
            'name'=>$request->name,
            'email' =>$request->email,
            'password' => bcrypt($request->password),
            'image'=>$request_data['image'],
            'gender' =>$request->gender,
        ]);

        session()->flash('success', 'تمت عملية الإضافة بنجاح');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->filled('password', 'password_confirmation')) {
            $request->validate([
                'name' => 'required',
                'image' => 'nullable|image',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'required|confirmed|min:8',
                'gender' => 'required'
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'image' => 'nullable|image',
                'email' => 'required|email|unique:admins,email,' . $id,
                'password' => 'nullable|confirmed|min:8',
                'gender' => 'required'
            ]);
        }

        if ($request->image) {
            File::delete(public_path('uploads/users/' . $user->image));
            $image = Image::make($request->image)->encode('png');
            $image->save('uploads/users/'.$request->image->hashName(),(string)$image);
            $request_data['image'] = $request->image->hashName();
        }

        $user->update([
            'name'=>$request->name,
            'email' =>$request->email,
            'gender' =>$request->gender,
            'password' => bcrypt($request->password),
            'image'=>@$request_data['image']??$user->image,

        ]);
        session()->flash('success', 'تمت عملية الإضافة بنجاح');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return response()->json([
            'success' => 'تمت عملية الحذف بنجاح'
        ]);
        // return redirect()->route('authors.index')->with('success', 'تمت عملية الحذف بنجاح');
    }
}
