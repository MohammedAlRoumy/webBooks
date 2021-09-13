@extends('admin.dashboard')


@section('content')

    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom card-transparent">
            <div class="card-body p-0">
                <!--begin::Card-->
                <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form"
                      method="post" action="{{route('settings.postSettings')}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <div class="card-header d-flex justify-content-between">
                            <!--begin::Wizard Actions-->
                            <div class=" mt-5">
                                <h3 class="card-label">إعدادات الموقع
                                    <div class="text-muted pt-2 font-size-sm">تعديل إعدادات الموقع </div>
                                </h3>
                            </div>

                            <div class=" mt-5">
                                <div>
                                    <button type="submit"
                                            class="btn btn-success btn-sm font-weight-bolder">
                                        تعديل <i class="fa fa-check"></i>
                                    </button>
                                    <a href="{{route('settings.getSettings')}}" id="next-step"
                                       class="btn btn-danger btn-sm font-weight-bolder">
                                        إلغاء <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end::Wizard Actions-->
                        </div>
                        <!--begin::Body-->
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="home" aria-selected="true">الاعدادات العامة</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="logo-tab" data-toggle="tab" href="#logo" role="tab" aria-controls="profile" aria-selected="false">الشعار</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="social-tab" data-toggle="tab" href="#social" role="tab" aria-controls="contact" aria-selected="false">وسائل التواصل الاجتماعي</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active pt-5" id="general" role="tabpanel" aria-labelledby="general-tab">
                                    @include('admin.settings.includes.general')
                                </div>
                                <div class="tab-pane fade pt-5" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                                    @include('admin.settings.includes.logo')
                                </div>
                                <div class="tab-pane fade pt-5" id="social" role="tabpanel" aria-labelledby="social-tab">
                                    @include('admin.settings.includes.social_links')
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
        var avatar2 = new KTImageInput('kt_image_2');
    </script>

@endsection

