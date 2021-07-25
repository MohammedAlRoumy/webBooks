<a href="{{route('categories.edit',$id)}}" class="edit btn btn-success btn-sm m-1"> <i class="fa fa-edit"></i></a>


<a href="{{ route('categories.destroy',$id) }}" class="btn btn-danger btn-sm delete m-1"  id="deleteCategory" data-id="{{$id}}">
    <i class="la la-trash"></i>
</a>
