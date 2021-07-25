<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DataTables;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(CategoryDataTable $dataTable){

        return $dataTable->render('admin.categories.index');
    }

   /* public function getList(Request $request){

        $model = Category::query();

        return DataTables::eloquent($model)->toJson();;
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
        ]);


        if($request->status){
            $status = 'active';
        }else{
            $status = 'inactive';
        }

        Category::create([
            'name'=>$request->name,
            'status'=>$status
        ]);
        session()->flash('success', 'تمت عملية الإضافة بنجاح');
        return redirect()->route('categories.index');
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
        $category = Category::findOrfail($id);
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $category = Category::findOrfail($id);
        $validated = $request->validate([
            'name' => 'required',
        ]);


        if($request->status){
            $status = 'active';
        }else{
            $status = 'inactive';
        }

        $category->update([
            'name'=>$request->name,
            'status'=>$status
        ]);
        session()->flash('success', 'تمت عملية التعديل بنجاح');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'تمت عملية الحذف بنجاح');
    }

    public function delete(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->delete();
        return response()->json([
            'success' => 'تمت عملية الحذف بنجاح'
        ]);
       // return redirect()->route('categories.index')->with('success', 'تمت عملية الحذف بنجاح');
    }

    public function status(Request $request){
        $id = $request->get('id');

        $info = Category::find($id);
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
