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
                        <h3 class="card-label">اتصل بنا</h3>
                    </div>
                    <div class="card-toolbar">

                        <!--begin::Button-->
                        <!--end::Button-->
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

    <!-- contact us  modal -->
    <div class="modal fade" id="show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom border-3 border-primary">
                    <h5 class="modal-title" id="exampleModalLabel">تفاصيل الرسالة</h5>
                    <button type="button" class="btn btn-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="">
                        <div class="mb-2">
                            <label for="name" class="form-label">الاسم</label>
                            <input type="text" class="form-control" id="name" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">البريد الالكتروني</label>
                            <input type="email" class="form-control" id="email"
                                   aria-describedby="emailHelp" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="title" class="form-label">عنوان الرسالة</label>
                            <input type="text" class="form-control" id="title" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="message" class="form-label">محتوى الرسالة</label>
                            <textarea class="form-control" id="message" readonly></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
    <!--end contact us modal-->

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

            $(document).on("click", "#deleteContact", function (e) {


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
                                url: "{{ route('contact_us.delete') }}", //or you can use url: "company/"+id,
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

    <script>
        $(document).ready(function () {

            $('#show').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var name = button.data('name') // Extract info from data-* attributes
                var email = button.data('email') // Extract info from data-* attributes
                var title = button.data('title') // Extract info from data-* attributes
                var message = button.data('message') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-body #name').val(name)
                modal.find('.modal-body #email').val(email)
                modal.find('.modal-body #title').val(title)
                modal.find('.modal-body #message').val(message)
            })

        });
    </script>

@endsection
