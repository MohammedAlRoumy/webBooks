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
                      method="post" action="{{route('admins.store')}}"
                      enctype="multipart/form-data">

                    @csrf
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <div class="card-header d-flex justify-content-between">
                            <!--begin::Wizard Actions-->
                            <div class=" mt-5">
                                <h3 class="card-label">الادارة
                                    <div class="text-muted pt-2 font-size-sm">اضافة مدير جديد</div>
                                </h3>
                            </div>

                            <div class=" mt-5">
                                <div>
                                    @can('add_admins')
                                        <button type="submit"
                                                class="btn btn-success btn-sm font-weight-bolder">
                                            إضافة <i class="fa fa-check"></i>
                                        </button>
                                    @endcan
                                    @can('view_admins')
                                        <a href="{{route('admins.index')}}" id="next-step"
                                           class="btn btn-danger btn-sm font-weight-bolder">
                                            إلغاء <i class="fa fa-times"></i>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                            <!--end::Wizard Actions-->
                        </div>
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">صورة المدير
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
                                <label class="col-xl-3 col-lg-3 col-form-label text-left"> الاسم
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input type="text" class="form-control" name="name" placeholder="ادخل اسم ">

                                    <div class="fv-plugins-message-container">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left"> البريد الالكتروني
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input type="email" class="form-control" name="email"
                                           placeholder="ادخل البريد الالكتروني ">

                                    <div class="fv-plugins-message-container">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">كلمة المرور
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input type="password" class="form-control" name="password"
                                           placeholder="ادخل كلمة المرور ">

                                    <div class="fv-plugins-message-container">
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">تأكيد كلمة المرور
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input type="password" class="form-control" name="password_confirmation"
                                           placeholder="ادخل تأكيد كلمة المرور ">

                                    <div class="fv-plugins-message-container">
                                        @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">الصلاحيات <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <select class="form-control" name="role" id="exampleSelect1">
                                        <option value="">اختر صلاحية</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
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

    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    {{--    <script src="{{asset('assets/js/pages/crud/forms/editors/ckeditor-classic.js')}}"></script>--}}
    <script>
        var avatar1 = new KTImageInput('kt_image_1');
    </script>

@endsection
