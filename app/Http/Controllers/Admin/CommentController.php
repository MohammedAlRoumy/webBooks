<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\CommentDataTable;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(CommentDataTable $dataTable)
    {
        return $dataTable->render('admin.comments.index');
    }

    public function delete(Request $request)
    {
        $book = Comment::findOrFail($request->id);
        $book->delete();
        return response()->json([
            'success' => 'تمت عملية الحذف بنجاح'
        ]);
        // return redirect()->route('authors.index')->with('success', 'تمت عملية الحذف بنجاح');
    }

    public function status(Request $request){
        $id = $request->get('id');

        $info = Comment::find($id);
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
