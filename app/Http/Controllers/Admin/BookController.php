<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\BookDataTable;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Image;

class BookController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(BookDataTable $dataTable)
    {
        return $dataTable->render('admin.books.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.books.create',compact('authors','categories'));
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
            'author_id'=>'required|exists:authors,id',
            'category_id'=>'required|exists:categories,id',
            'description' => 'required',
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
            $image->save('uploads/books/'.$request->image->hashName(),(string)$image);
            $request_data['image'] = $request->image->hashName();
        }

        Book::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'author_id'=>$request->author_id,
            'category_id'=>$request->category_id,
            'status'=>$status,
            'image'=>$request_data['image']
        ]);

        session()->flash('success', 'تمت عملية الإضافة بنجاح');
        return redirect()->route('books.index');
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
        $book = Book::findOrFail($id);
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.books.edit',compact('authors','categories','book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $book = Book::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required',
            'author_id'=>'required|exists:authors,id',
            'category_id'=>'required|exists:categories,id',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        if($request->status){
            $status = 'active';
        }else{
            $status = 'inactive';
        }

        $request_data = $request->except(['image']);

        if ($request->image) {
            File::delete(public_path('uploads/books/' . $book->image));
            $image = Image::make($request->image)->resize(171, 241)->encode('png');
            $image->save('uploads/books/'.$request->image->hashName(),(string)$image);
            $request_data['image'] = $request->image->hashName();
        }

        $book->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'author_id'=>$request->author_id,
            'category_id'=>$request->category_id,
            'status'=>$status,
            'image'=>@$request_data['image']?:$book->image
        ]);

        session()->flash('success', 'تمت عملية التعديل بنجاح');
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

    public function delete(Request $request)
    {
        $book = Book::findOrFail($request->id);
        $book->delete();
        return response()->json([
            'success' => 'تمت عملية الحذف بنجاح'
        ]);
        // return redirect()->route('authors.index')->with('success', 'تمت عملية الحذف بنجاح');
    }

    public function status(Request $request){
        $id = $request->get('id');

        $info = Book::find($id);
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
