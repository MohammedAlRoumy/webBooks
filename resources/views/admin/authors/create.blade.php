@extends('admin.dashboard')

@section('css')
    <link href="{{asset('assets/css/pages/wizard/wizard-4.rtl.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom card-transparent">
            <div class="card-body p-0">
                <!--begin::Card-->
                <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form"
                      method="post" action="{{route('authors.store')}}"
                      enctype="multipart/form-data">

                    @csrf
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <div class="card-header d-flex justify-content-between">
                            <!--begin::Wizard Actions-->
                            <div class=" mt-5">
                                <h3 class="card-label">المؤلفون
                                    <div class="text-muted pt-2 font-size-sm">اضافة مؤلف جديد</div>
                                </h3>
                            </div>

                            <div class=" mt-5">
                                <div>
                                    <button type="submit"
                                            class="btn btn-success btn-sm font-weight-bolder">
                                        إضافة <i class="fa fa-check"></i>
                                    </button>
                                    <a href="{{route('authors.index')}}" id="next-step"
                                       class="btn btn-danger btn-sm font-weight-bolder">
                                        إلغاء <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end::Wizard Actions-->
                        </div>
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">صورة المؤلف
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <div class="image-input image-input-outline" id="kt_image_1">
                                        <div class="image-input-wrapper"
                                             style="background-image: url({{asset('assets/media/users/blank.png')}})"></div>

                                        <label
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="change" data-toggle="tooltip" title=""
                                            data-original-title="تغيير الصورة">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" name="حذف الصورة"/>
                                        </label>

                                        <span
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                    <div class="fv-plugins-message-container">
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">اسم المؤلف
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input type="text" class="form-control" name="name" placeholder="ادخل اسم المؤلف">

                                    <div class="fv-plugins-message-container">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>


                            <div class="form-group row cke_rtl" dir="rtl">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">السيرة الذاتية للمؤلف
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <textarea name="bio" id="kt-ckeditor-1"></textarea>
                                    <div class="fv-plugins-message-container">
                                        @error('bio')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">الحالة</label>
                                <div class="col-lg-9 col-xl-9">
                                       <span class="switch switch-outline switch-icon switch-danger">
                                        <label>
                                         <input type="checkbox" name="status"/>
                                         <span></span>
                                        </label>
                                       </span>
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
