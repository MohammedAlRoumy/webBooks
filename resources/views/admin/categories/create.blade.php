@extends('admin.dashboard')


@section('content')

    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom card-transparent">
            <div class="card-body p-0">
                <!--begin::Card-->
                <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form"
                      method="post" action="{{route('categories.store')}}"
                      enctype="multipart/form-data">

                    @csrf
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <div class="card-header d-flex justify-content-between">
                            <!--begin::Wizard Actions-->
                            <div class=" mt-5">
                                    <h3 class="card-label">التصنيفات
                                        <div class="text-muted pt-2 font-size-sm">اضافة تصنيف جديد</div>
                                    </h3>
                            </div>

                            <div class=" mt-5">
                                <div>
                                    <button type="submit"
                                            class="btn btn-success btn-sm font-weight-bolder">
                                        إضافة <i class="fa fa-check"></i>
                                    </button>
                                    <a href="{{route('categories.index')}}" id="next-step"
                                       class="btn btn-danger btn-sm font-weight-bolder">
                                        إلغاء <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end::Wizard Actions-->
                        </div>
                        <!--begin::Body-->
                        <div class="card-body">

                                <div class="form-group">
                                    <label>التصنيف
                                        <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="ادخل التصنيف">

                                    <div class="fv-plugins-message-container">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">الحالة</label>
                                    <div class="col-10">
                                       <span class="switch switch-outline switch-icon switch-danger">
                                        <label>
                                         <input type="checkbox"  name="status"/>
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

@endsection
