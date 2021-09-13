@can('edit_comments,view_comments')
    <button type="button" data-id="{{$id}}" data-comment="{{$comment}}" id="showComment"
            class="showit btn btn-primary btn-sm m-1"
            data-toggle="modal" data-target="#show">
        <i class="fa fa-eye"></i>
    </button>
@endcan
@can('delete_comments')
    <a href="" class="btn btn-danger btn-sm delete m-1" id="deleteComment" data-id="{{$id}}">
        <i class="la la-trash"></i>
    </a>
@endcan
