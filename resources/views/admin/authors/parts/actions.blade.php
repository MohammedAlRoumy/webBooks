@can('edit_authors')
    <a href="{{route('authors.edit',$id)}}" class="edit btn btn-success btn-sm m-1"> <i class="fa fa-edit"></i></a>
@endcan

@can('delete_authors')
    <a href="" class="btn btn-danger btn-sm delete m-1" id="deleteAuthor" data-id="{{$id}}">
        <i class="la la-trash"></i>
    </a>
@endcan
