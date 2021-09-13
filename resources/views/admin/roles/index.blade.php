@extends('admin.dashboard')

@section('css')
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">الصلاحيات</h3>
                    </div>
                    <div class="card-toolbar">
                    @can('add_roles')
                        <!--begin::Button-->
                        <a href="{{route('roles.create')}}" class="btn btn-primary font-weight-bolder">
                            <i class="fa fa-plus"></i> جديد </a>
                        <!--end::Button-->
                        @endcan
                    </div>
                </div>
                <div class="card-body ">
                    <!--begin: Datatable-->
                {!! $dataTable->table(['class'=>'table table-bordered table-hover table-checkable order-column text-center'],true) !!}
                <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->

            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>

@endsection

@section('js')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

    {!! $dataTable->scripts() !!}

     <script type="text/javascript">
         $(document).ready(function () {
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $(document).on("click","#deleteRole",function(e){


                 e.preventDefault();
                 var id = $(this).data("id");
                 // var id = $(this).attr('data-id');
                 var token = $("meta[name='csrf-token']").attr("content");
                 var url = e.target;
                 Swal.fire(
                     {

                         title: "هل انت متأكد ؟",

                         text: "هل تريد بالتأكيد القيام بالاجراء",

                         icon: "warning",

                         showCancelButton: 1,

                         confirmButtonText: "نعم , قم بالاجراء !",

                         cancelButtonText: "لا, الغي العملية !",

                         reverseButtons: 1

                     }).then(function (e) {


                     if (e.value) {
                         $.ajax(
                             {
                                 // url: url.href, //or you can use url: "company/"+id,
                                 url: "{{ route('roles.delete') }}", //or you can use url: "company/"+id,
                                 type: 'POST',
                                 data: {
                                     id: id,
                                     _token:token
                                 },
                                 success: function (response) {

                                     $("#success").html(response.message)
                                     Swal.fire({

                                         title: 'تم القيام بالعملية بنجاح',

                                         icon: 'success',

                                         timer: 10000,

                                         showConfirmButton: false

                                     }).then(location.reload())
                                 }
                             });
                     }else{
                         e.dismiss && Swal.fire("تم الالغاء", "لم يتم عمل اي تغيير", "error");
                     }
                 });
             });

         });
     </script>

@endsection
