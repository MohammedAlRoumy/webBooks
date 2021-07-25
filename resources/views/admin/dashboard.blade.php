
<!DOCTYPE html>

<html lang="ar" dir="rtl">
<!--begin::Head-->
<head><base href="">
    <meta charset="utf-8" />
    <title>Metronic Live preview | Keenthemes</title>
    <meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('includes.head')
    @yield('css')
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed  aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<!--begin::Header Mobile-->
@include('includes.mobile-header')
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
       @include('includes.aside')
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
           @include('includes.header')
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->
{{--                @yield('subheader')--}}
                <!--end::Subheader-->
                <!--begin::Entry-->
                    @yield('content')
                <!--end::Entry-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
         @include('includes.footer')
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->
{{--@include('includes.panels')--}}

@include('includes.footer-scripts')
@yield('js')
</body>
<!--end::Body-->
</html>
