<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminDataTable;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;
use File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDataTable $dataTable)
    {
        return $dataTable->render('admin.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed|min:8',
            'role' => 'required'
        ]);
        if ($request->image) {

            $image = Image::make($request->image)->encode('png');
            $image->save('uploads/admins/' . $request->image->hashName(), (string)$image);
            $request_data['image'] = $request->image->hashName();
        }


        // $request->merge(['password' => bcrypt($request->password)]);

        // $admin = Admin::create($request->all());
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $request_data['image'],
        ]);
        $admin->assignRole([$request->input('role')]);
        session()->flash('success', 'تمت عملية الإضافة بنجاح');
        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $admin = Admin::findOrFail($id);
        $roles = Role::all();
        return view('admin.admins.edit', compact('roles', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        if ($request->filled('password', 'password_confirmation')) {
            $request->validate([
                'name' => 'required',
                'image' => 'nullable|image',
                'email' => 'required|email|unique:admins,email,' . $id,
                'password' => 'required|confirmed|min:8',
                'role' => 'required'
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'image' => 'nullable|image',
                'email' => 'required|email|unique:admins,email,' . $id,
                'password' => 'nullable|confirmed|min:8',
                'role' => 'required'
            ]);
        }

        if ($request->image) {
            File::delete(public_path('uploads/admins/' . $admin->image));

            $image = Image::make($request->image)->encode('png');
            $image->save('uploads/admins/' . $request->image->hashName(), (string)$image);
            $request_data['image'] = $request->image->hashName();
        }


        // $request->merge(['password' => bcrypt($request->password)]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => @$request_data['image']??$admin->image,
        ]);
        $admin->assignRole([$request->input('role')]);
        session()->flash('success', 'تمت عملية الإضافة بنجاح');
        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(Request $request)
    {
        $admin = Admin::findOrFail($request->id);
        $admin->delete();
        return response()->json([
            'success' => 'تمت عملية الحذف بنجاح'
        ]);
        // return redirect()->route('authors.index')->with('success', 'تمت عملية الحذف بنجاح');
    }

    public function editProfile()
    {
        return view('admin.admins.profile');
    }

    public function updateProfile(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        if ($request->filled('password', 'password_confirmation')) {
            $request->validate([
                'name' => 'required',
                'image' => 'nullable|image',
                'email' => 'required|email|unique:admins,email,' . $id,
                'password' => 'required|confirmed|min:8',
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'image' => 'nullable|image',
                'email' => 'required|email|unique:admins,email,' . $id,
                'password' => 'nullable|confirmed|min:8',
            ]);
        }

        if ($request->image) {
            File::delete(public_path('uploads/admins/' . $admin->image));

            $image = Image::make($request->image)->encode('png');
            $image->save('uploads/admins/' . $request->image->hashName(), (string)$image);
            $request_data['image'] = $request->image->hashName();
        }


        // $request->merge(['password' => bcrypt($request->password)]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => @$request_data['image']??$admin->image,
        ]);
        session()->flash('success', 'تمت عملية الإضافة بنجاح');
        return redirect()->route('admins.index');
    }

}
