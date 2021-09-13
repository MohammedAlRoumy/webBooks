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
                      method="post" action="{{route('roles.store')}}"
                      enctype="multipart/form-data">

                    @csrf
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <div class="card-header d-flex justify-content-between">
                            <!--begin::Wizard Actions-->
                            <div class=" mt-5">
                                <h3 class="card-label">الصلاحيات
                                    <div class="text-muted pt-2 font-size-sm">اضافة صلاحية جديدة</div>
                                </h3>
                            </div>

                            <div class=" mt-5">
                                <div>
                                    <button type="submit"
                                            class="btn btn-success btn-sm font-weight-bolder">
                                        إضافة <i class="fa fa-check"></i>
                                    </button>
                                    <a href="{{route('roles.index')}}" id="next-step"
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
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">اسم الصلاحية
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input type="text" class="form-control" name="name" placeholder="ادخل اسم الصلاحية">

                                    <div class="fv-plugins-message-container">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>


                            <h3>الاذونات</h3>
                            <hr>
                            <div class="col-md-12">
                                <div class="row">

                                    <table class="table table-responsive">
                                        <thead>
                                        <tr>
                                            <th style="text-align: right">اسم القسم</th>
                                            @php
                                                $permission_maps = ['view', 'add', 'edit', 'delete','activate'];
                                            @endphp

                                            <th style="text-align: center">عرض</th>
                                            <th style="text-align: center">إضافة</th>
                                            <th style="text-align: center">تعديل</th>
                                            <th style="text-align: center">حذف</th>
                                            <th style="text-align: center">تفعيل</th>
                                            <th style="text-align: center">فعل</th>
                                            <th style="text-align: center">عطل</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @php
                                            $models = ['dashboard','admins', 'settings', 'roles','categories','authors','books',
                                                         'users', 'comments','contacts','our_mission','publish','policies','copyrights'];
                                        @endphp


                                        @foreach($models as $model)
                                            <tr>
                                                <td style="text-align: right">
                                                    {{__('cp.'.$model)}}{{-- اسم المودل --}}
                                                </td>
                                                @foreach($permission_maps as $permission_map)
                                                    <td style="text-align: center">
                                                        <label class="checkbox justify-content-center">
                                                            <input type="checkbox"
                                                                   name="permission[]" class="rule"
                                                                   value="{{$permission_map . '_' . $model}}"><span></span>
                                                            {{--                                            {{$permission_map . '_' . $model}}--}}
                                                        </label>
                                                    </td>
                                                @endforeach
                                                <td style="width: 5%;">
                                                    <a href="#" class="reg-all" style="padding: 5px;margin: 0 5px;"
                                                       data-skin="dark" data-tooltip="m-tooltip" data-placement="top"
                                                       title="فعل الجميع"><i
                                                            class="fa fa-check"></i> </a>
                                                </td>
                                                <td style="width: 5%;">
                                                    <a href="#" class="de-reg-all" style="padding: 5px;margin: 0 5px;"
                                                       data-skin="dark" data-tooltip="m-tooltip" data-placement="top"
                                                       title="عطل الجميع"><i
                                                            class="fa fa-times"></i> </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
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

    <script>
        $(function () {
            $('.reg-all').click(function (e) {
                e.preventDefault();
                $(this).parent().parent().find('.rule').each(function (i) {
                    var IsCheck = $(this).is(":checked");
                    if (!IsCheck) {
                        $(this).click();
                    }
                });
            });
            $('.de-reg-all').click(function (e) {
                e.preventDefault();
                $(this).parent().parent().find('.rule').each(function (i) {
                    var IsCheck = $(this).is(":checked");
                    if (IsCheck) {
                        $(this).click();
                    }
                });
            });
        })
    </script>
@endsection
