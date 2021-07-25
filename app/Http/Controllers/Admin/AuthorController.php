<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\AuthorDataTable;
use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Image;
use File;

class AuthorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(AuthorDataTable $dataTable){

        return $dataTable->render('admin.authors.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'bio' => 'required',
            'image' => 'required|image',
        ]);


        if($request->status){
            $status = 'active';
        }else{
            $status = 'inactive';
        }

        $request_data = $request->except(['image']);

        if ($request->image) {

            $image = Image::make($request->image)->resize(171, 241)->encode('png');
            $image->save('uploads/authors/'.$request->image->hashName(),(string)$image);
            $request_data['image'] = $request->image->hashName();
        }

        Author::create([
            'name'=>$request->name,
            'bio'=>$request->bio,
            'status'=>$status,
            'image'=>$request_data['image']
        ]);

        session()->flash('success', 'تمت عملية الإضافة بنجاح');
        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $author = Author::findOrfail($id);
        return view('admin.authors.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $author = Author::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required',
            'bio' => 'required',
            'image' => 'nullable|image',
        ]);


        if($request->status){
            $status = 'active';
        }else{
            $status = 'inactive';
        }

        $request_data = $request->except(['image']);

        if ($request->image) {
            File::delete(public_path('uploads/authors/' . $author->image));
            $image = Image::make($request->image)->resize(171, 241)->encode('png');
            $image->save('uploads/authors/'.$request->image->hashName(),(string)$image);
            $request_data['image'] = $request->image->hashName();
        }

        $author->update([
            'name'=>$request->name,
            'bio'=>$request->bio,
            'status'=>$status,
            'image'=>@$request_data['image']?:$author->image
        ]);
        session()->flash('success', 'تمت عملية التعديل بنجاح');
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $author = Author::findOrFail($request->id);
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'تمت عملية الحذف بنجاح');
    }

    public function delete(Request $request)
    {
        $author = Author::findOrFail($request->id);
        $author->delete();
        return response()->json([
            'success' => 'تمت عملية الحذف بنجاح'
        ]);
        // return redirect()->route('authors.index')->with('success', 'تمت عملية الحذف بنجاح');
    }

    public function status(Request $request){
        $id = $request->get('id');

        $info = Author::find($id);
        if ($info)
        {
            $status = $info->status;
            if($status == 'inactive')
            {
                $info->status = 'active';
                $updated = $info->save();
                if($updated)
                {
                    return response()->json(['status' => 'success', 'message' => 'تم تغيير الحالة لمفعل', 'type' => 'yes']);
                }
                else
                {
                    return response()->json(['status' => 'error', 'message' =>'حدث خطأ ما']);
                }
            }
            else
            {
                $info->status = 'inactive';
                $updated = $info->save();
                if($updated)
                {
                    return response()->json(['status' => 'success', 'message' => 'تم تغيير الحالة لمعطل', 'type' => 'no']);
                }
                else
                {
                    return response()->json(['status' => 'error', 'message' => 'حدث خطأ ما']);
                }
            }
        }
        else
        {
            return response()->json(['status' => 'error', 'message' => 'لا يوجد عنصر']);
        }
    }

}

?>
