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
                        <h3 class="card-label">التصنيفات</h3>
                    </div>
                    <div class="card-toolbar">
                        @can('add_categories')
                        <!--begin::Button-->
                        <a href="{{route('categories.create')}}" class="btn btn-primary font-weight-bolder">
                            <i class="fa fa-plus"></i> جديد </a>
                        <!--end::Button-->
                        @endcan
                    </div>
                </div>
                <div class="card-body ">
                    <!--begin: Datatable-->
                {{-- <table class="table table-striped table-bordered table-hover table-checkable order-column"
                        id="category_table">
                     <thead>
                     <tr>
                         <th>#</th>
                         <th>اسم التصنيف</th>
                         <th>الحالة</th>
                         <th>تاريخ النشر</th>
                         <th>الادوات</th>
                     </tr>
                     </thead>
                     <tbody></tbody>
                 </table>--}}
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
    {{--    <script src="{{asset('assets/js/pages/crud/ktdatatable/base/data-json.js')}}"></script>--}}
    {{--    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>--}}
    {{--    <script src="{{asset('assets/js/pages/crud/datatables/data-sources/ajax-server-side.js')}}"></script>--}}
    {{--<script src="{{asset('assets/js/pages/crud/ktdatatable/base/data-ajax.js')}}"></script>--}}
    {{--    <script src="{{asset('assets/js/pages/crud/datatables/basic/headers.js')}}"></script>--}}

    {!! $dataTable->scripts() !!}

     <script type="text/javascript">
         $(document).ready(function () {
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $(document).on("click","#deleteCategory",function(e){


                 e.preventDefault();
                 var id = $(this).data("id");
                 // var id = $(this).attr('data-id');
                // var token = $("meta[name='csrf-token']").attr("content");
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
                                 url: "{{ route('categories.delete') }}", //or you can use url: "company/"+id,
                                 type: 'POST',
                                 data: {
                                     id: id
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

             $(document).on('click', ".status", function() {
                 var id = $(this).data('href');
                 var item = $(this);
                 $.ajax({
                     type: "POST",
                     url: "{{ route('categories.status') }}",
                     data: {'id' : id},
                     success:function (data){
                         if(data.type == 'yes')
                         {
                             item.removeClass("btn-dark");
                             item.addClass("btn-primary");
                             item.html('<i class="fa fa-check"></i>');
                         }
                         else if(data.type == 'no')
                         {
                             item.removeClass("btn-primary");
                             item.addClass("btn-dark");
                             item.html('<i class="fa fa-times"></i> ');
                         }
                         toastr[data.status](data.message);
                     }
                 });
             });

         });
     </script>


    {{-- <script type="text/javascript">
         $(document).ready(function () {
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $(function () {
                 var table = $('#category_table').DataTable({
                     paging: true,
                     searching: true,
                     serverSide: true,
                     language: {
                         "url": "assets/plugins/custom/datatables/ar.json"
                     },
                     ajax: {
                         url: "{{ route('categories.getList') }}",
                     },
                     columns: [
                         {"data": "", "name": "#", "orderable": false, "searchable": false},

                         {
                             "data": "name",
                             "name": "اسم التصنيف",
                             "orderable": true,
                             "searchable": false
                         },
                         {
                             "data": "status",
                             "name": "الحالة",
                             "orderable": true,
                             "searchable": false
                         },
                         {
                             "data": "created_at",
                             "name": "تاريخ الاضافة",
                             "orderable": true,
                             "searchable": false
                         },
                         {
                             "data": "actions",
                             "name": "أدوات",
                             "orderable": false,
                             "searchable": false
                         }
                     ],
                     columnDefs: [
                         {
                             "defaultContent": "-",
                             "targets": "_all"
                         }
                         ],
                     fnDrawCallback: function (oSettings) {
                         $('.tooltips').tooltip();

                         table.column(0).nodes().each(function (cell, i) {
                             cell.innerHTML =  i + 1;
                         });
                     }
                 });
                 $('.searchable').on('input', function (e) {
                     e.preventDefault();
                     table.draw();
                 });
             });
         });
     </script>--}}

@endsection
