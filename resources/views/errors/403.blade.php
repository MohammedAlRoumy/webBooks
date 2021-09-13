@extends('admin.dashboard')


@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->

            <!--begin::Card-->
            <div class="card card-custom">

                <div class="card-body ">
                    <div class="row">

                        <div class="col-6">

                            <img src="{{asset('errors/403.png')}}" alt="" width="100%">

                        </div>
                        <div class="col-6 align-self-center">
                            <h1 class="text-danger">خطأ 403</h1>
                            <h3> ليس لديك صلاحية الوصول لهذه الصفحة</h3>
                                <a class="btn btn-primary" href="{{URL::previous()}}"><i class="fa fa-arrow-right"></i>رجوع للصفحة السابقة</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Card-->

            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>

@endsection

@section('js')


@endsection
