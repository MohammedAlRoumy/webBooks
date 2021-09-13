@if($id > 1)
    @can('edit_admins')
        <a href="{{route('admins.edit',$id)}}" class="edit btn btn-success btn-sm m-1"> <i class="fa fa-edit"></i></a>
    @endcan

    @can('delete_admins')
        <a href="" class="btn btn-danger btn-sm delete m-1" id="deleteAdmin" data-id="{{$id}}">
            <i class="la la-trash"></i>
        </a>
    @endcan
@endif
