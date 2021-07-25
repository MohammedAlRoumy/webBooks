<button type="button" data-id="{{$id}}" data-name="{{$name}}" data-email="{{$email}}" data-title="{{$title}}" data-message="{{$message}}"  id="showBook" class="showit btn btn-primary btn-sm m-1"
        data-toggle="modal" data-target="#show">
    <i class="fa fa-eye"></i>
</button>


<a href="{{route('books.destroy',$id)}}"  class="btn btn-danger btn-sm delete m-1"  id="deleteBook" data-id="{{$id}}">
    <i class="la la-trash"></i>
</a>
