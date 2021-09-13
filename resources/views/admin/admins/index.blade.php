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
                        <h3 class="card-label">الادارة</h3>
                    </div>
                    <div class="card-toolbar">
                    @can('add_admins')
                        <!--begin::Button-->
                            <a href="{{route('admins.create')}}" class="btn btn-primary font-weight-bolder">
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

            $(document).on("click", "#deleteAdmin", function (e) {


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
                                url: "{{ route('admins.delete') }}", //or you can use url: "company/"+id,
                                type: 'POST',
                                data: {
                                    id: id,
                                    _token: token
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
                    } else {
                        e.dismiss && Swal.fire("تم الالغاء", "لم يتم عمل اي تغيير", "error");
                    }
                });
            });

        });
    </script>

@endsection
