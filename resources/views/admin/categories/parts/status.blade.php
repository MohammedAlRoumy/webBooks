@if($status == 'active')
    <a data-href="{{$id}}" class="btn btn-sm btn-primary @can('activate_categories') status @endcan">
        <i class="fa fa-check"></i>
    </a>
@elseif($status == 'inactive')
    <a data-href="{{$id}}" class="btn btn-sm btn-dark @can('activate_categories') status @endcan">
        <i class="fa fa-times"></i>
    </a>
@endif
