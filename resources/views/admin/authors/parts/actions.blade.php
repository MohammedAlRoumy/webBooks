<a href="{{route('authors.edit',$id)}}" class="edit btn btn-success btn-sm m-1"> <i class="fa fa-edit"></i></a>


<a href="{{route('authors.destroy',$id)}}"  class="btn btn-danger btn-sm delete m-1"  id="deleteAuthor" data-id="{{$id}}">
    <i class="la la-trash"></i>
</a>
