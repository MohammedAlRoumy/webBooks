@can('edit_users')
    <a href="{{route('users.edit',$id)}}" class="edit btn btn-success btn-sm m-1"> <i class="fa fa-edit"></i></a>
@endcan
@can('delete_users')
    <a href="" class="btn btn-danger btn-sm delete m-1" id="deleteUser" data-id="{{$id}}">
        <i class="la la-trash"></i>
    </a>
@endcan
