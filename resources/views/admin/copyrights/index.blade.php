@extends('admin.dashboard')


@section('content')

    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom card-transparent">
            <div class="card-body p-0">
                <!--begin::Card-->
                <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form"
                      method="post" action="{{route('settings.postCopyrights')}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <div class="card-header d-flex justify-content-between">
                            <!--begin::Wizard Actions-->
                            <div class=" mt-5">
                                <h3 class="card-label">حقوق النشر
                                    <div class="text-muted pt-2 font-size-sm">تعديل بيانات حقوق النشر </div>
                                </h3>
                            </div>

                            <div class=" mt-5">
                                <div>
                                    <button type="submit"
                                            class="btn btn-success btn-sm font-weight-bolder">
                                        تعديل <i class="fa fa-check"></i>
                                    </button>
                                    <a href="{{route('settings.getCopyrights')}}" id="next-step"
                                       class="btn btn-danger btn-sm font-weight-bolder">
                                        إلغاء <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end::Wizard Actions-->
                        </div>
                        <!--begin::Body-->
                        <div class="card-body">

                            <div class="form-group row cke_rtl" dir="rtl">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">حقوق النشر
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <textarea name="copyrights" id="kt-ckeditor-1">{{old('copyrights',@$page['copyrights'])}}</textarea>
                                    <div class="fv-plugins-message-container">
                                        @error('copyrights')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
                <!--end::Body-->
            </div>
            <!--end::Card-->

        </div>
    </div>
    <!--end::Container-->

@endsection

@section('js')
    <script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>

    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    {{--    <script src="{{asset('assets/js/pages/crud/forms/editors/ckeditor-classic.js')}}"></script>--}}
    <script>
        var avatar1 = new KTImageInput('kt_image_1');
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#kt-ckeditor-1'), {

                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'fontSize',
                        'fontColor',
                        'alignment',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'indent',
                        'outdent',
                        '|',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'undo',
                        'redo',
                        'exportPdf',
                        'exportWord'
                    ]
                },
                language: "ar",
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                },
                licenseKey: '',

            })
            .then(editor => {
                window.editor = editor;


            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
                console.warn('Build id: xcs2esji16m9-tqzhsy8f19xk');
                console.error(error);
            });


    </script>
@endsection

