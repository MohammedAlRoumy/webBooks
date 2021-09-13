<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('frontend/assets/dist/css/bootstrap.rtl.min.css')}}">
    <link href="{{asset('frontend/assets/dist/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/dist/css/fontawesome-stars.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link href="{{asset('frontend/assets/dist/css/style.css')}}" rel="stylesheet">

</head>

<body>
<nav class="border-bottom top-header">
    <div class="container d-flex justify-content-between">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2 border-start" aria-current="page"><i
                        class="fa fa-heart text-danger"></i> مهمتنا</a></li>
            <li class="nav-item">
                <a href="#contactUs" class="nav-link link-dark px-2 border-start border-end"
                   data-bs-toggle="modal">
                    <i class="fa fa-phone"></i>
                    اتصل بنا</a>
            </li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2 border-start">
                    <i class="fa fa-facebook-f"></i></a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2 border-start">
                    <i class="fa fa-instagram"></i></a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2 border-start">
                    <i class="fa fa-youtube-play"></i></a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2 border-start border-end">
                    <i class="fa fa-twitter"></i></a></li>
        </ul>
    </div>
</nav>
<header class="border-bottom ">
    <!--        <div class="container d-flex justify-content-between">-->
    <nav class="navbar navbar-expand-lg navbar-light text-dark p-0">
        <div class="container d-flex justify-content-between">
            <span class="d-flex flex-fill align-items-center">
<!--                <a href="" class="fs-4 text-dark text-decoration-none">Double header</a>-->
                <a href="" class=" text-dark text-decoration-none"><img src="{{asset('frontend/assets/dist/images/logo.png')}}" alt=""
                                                                        width="80"></a>
            </span>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Str::is('site.index',Route::currentRouteName()) ? 'active' : '' }}" aria-current="page" href="{{route('site.index')}}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Str::is('site.books',Route::currentRouteName()) ? 'active' : '' }}" href="{{route('site.books')}}">الكتب</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="">المؤلفون</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="">التصنيفات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="">مهمتنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="">انشر معنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="">اتصل بنا</a>
                    </li>
                </ul>
                @auth
                    <ul class="navbar-nav d-flex">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown1" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i> ملفي الشخصي
                            </a>
                            <ul class="dropdown-menu mt-2" aria-labelledby="navbarDropdown1">
                                <li><a class="dropdown-item border-bottom text-dark" href="#"> <i
                                            class="fa fa-user"></i> الاسم </a></li>
                                <li><a class="dropdown-item border-bottom text-dark" href="#"> <i
                                            class="fa fa-bookmark"></i> مفضلتي </a></li>
                                <li><a class="dropdown-item border-bottom text-dark" href="#"> <i
                                            class="fa fa-star-half-empty"></i> مراجعاتي </a></li>
                                <li><a class="dropdown-item border-bottom text-dark" href="#"> <i
                                            class="fa fa-cog"></i> تعديل الحساب </a></li>
                                <li><a class="dropdown-item border-bottom text-dark" href="#"> <i
                                            class="fa fa-sign-out"></i> تسجيل الخروج </a></li>

                            </ul>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav d-flex">
                        <li class="nav-item"><a href="#" class="nav-link link-dark px-2 "> دخول <i
                                    class="fa fa-lock"></i></a></li>
                        <li class="nav-item"><a href="#" class="nav-link link-dark px-2 "> تسجيل
                                <i class="fa fa-user-plus"></i></a></li>
                    </ul>
                @endauth

            </div>
        </div>
    </nav>
    <!--        </div>-->
</header>

@yield('content')

<footer class="footer mt-auto py-3 bg-dark text-white">
    <div class="container">
        <div class="row d-flex justify-content-between g-4">
            <div class="col-md-3">
                <a href=""
                   class="d-flex flex-fill align-items-center mb-lg-0 me-lg-auto text-white text-decoration-none">
                    <span class="fs-4"><img src="{{asset('frontend/assets/dist/images/logo.png')}}" alt="" width="80"></span>
                </a>
                <hr>
                <p class="text-white mt-4">اشترك بالقائمة البريدية لموقعنا وتوصل بجديد الكتب التي يتم طرحها مباشرة على
                    بريدك
                    الإلكتروني</p>

                <form action="" class="d-flex input-group">
                    <input class="form-control" type="email" placeholder="اشتراك" aria-label="sub">
                    <button class="btn btn-primary" type="submit">اشتراك</button>
                </form>

            </div>

            <div class="col-md-3">
                <ul class="list-unstyled">
                    <li><a href="#contactUs" data-bs-toggle="modal" class="text-decoration-none text-white"><i
                                class="fa fa-link"></i> اتصل بنا</a></li>
                    <hr>
                    <li><a href="" class="text-decoration-none text-white"><i class="fa fa-link"></i> انشر معنا</a></li>
                    <hr>
                    <li><a href="" class="text-decoration-none text-white"><i class="fa fa-envelope"></i> info@book.com</a>
                    </li>
                    <hr>
                    <li class="d-flex justify-content-between">
                        <span><a href="#" class="text-decoration-none text-white">
                            <i class="fa fa-facebook-f"></i></a></span>
                        <span><a href="#" class="text-decoration-none text-white"><i
                                    class="fa fa-instagram"></i></a></span>
                        <span><a href="#" class="text-decoration-none text-white"><i
                                    class="fa fa-youtube-play"></i></a></span>
                        <span><a href="#" class="text-decoration-none text-white"><i
                                    class="fa fa-twitter"></i></a></span>

                    </li>

                </ul>
            </div>
            <div class="col-md-3">
                <h4>روابط سريعة</h4>
                <hr>
                <ul class="list-unstyled mt-4">
                    <li><a href="" class="text-decoration-none text-white"><i class="fa fa-link"></i> مهمتنا</a></li>
                    <hr>
                    <li><a href="" class="text-decoration-none text-white"><i class="fa fa-link"></i> سياسة الخصوصية</a>
                    </li>
                    <hr>
                    <li><a href="" class="text-decoration-none text-white"><i class="fa fa-link"></i> حقوق النشر</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<footer class="footer mt-auto py-3" style="background: #000">
    <div class="container">
        <div class="d-flex justify-content-center">
            <span class="text-muted">جميع الحقوق محفوظة @ 2021</span>
        </div>
    </div>
</footer>


<!-- contact us  modal -->
<div class="modal fade" id="contactUs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom border-3 border-primary">
                <h5 class="modal-title" id="exampleModalLabel">إتصل بنا</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" action="{{route('contactus')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>

                    <div class="mb-2">
                        <label for="name" class="form-label">الاسم</label>
                        <input type="text" class="form-control" name="name" placeholder="ادخل اسم" id="name"
                               required="required">
                        <div class="text-danger" id="name_error"></div>

                    </div>

                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">البريد الالكتروني</label>
                        <input type="email" class="form-control" name="email" placeholder="أدخل البريد الالكتروني"
                               id="exampleInputEmail1" required="required" style="direction: rtl">

                        <div class="text-danger" id="email_error"></div>

                    </div>
                    <div class="mb-2">
                        <label for="title" class="form-label">عنوان الرسالة</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="ادخل عنوان الرسالة"
                               required="required">

                        <div class="text-danger" id="title_error"></div>

                    </div>
                    <div class="mb-2">
                        <label for="message" class="form-label">محتوى الرسالة</label>
                        <textarea class="form-control" id="message" name="message" placeholder="ادخل محتوى الرسالة"
                                  required="required"></textarea>

                        <div class="text-danger" id="message_error"></div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-primary contact">إرسال</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end contact us modal-->

<script src="{{asset('frontend/assets/dist/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend/assets/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/dist/js/jquery.barrating.min.js')}}"></script>
{{--<script src="{{asset('assets/js/pages/features/miscellaneous/toastr.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('.example').barrating({
            theme: 'fontawesome-stars'
        });
    });

</script>

<script>
    $("form").validate();
</script>

<script>
    @if(Session::has('success'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.success("{{ session('success') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.warning("{{ session('warning') }}");
    @endif

</script>


<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', ".contact", function (e) {
            e.preventDefault();

            var name = $("input[name=name]").val();
            var email = $("input[name=email]").val();
            var title = $("input[name=title]").val();
            var message = $("textarea[name=message]").val();
            $.ajax({
                type: "POST",
                url: "{{ route('contactus') }}",
                data: {_token: "{{ csrf_token() }}", name: name, email: email, title: title, message: message},

                success: function (result) {

                    if (result.errors) {
                        $('.alert-danger').html('');

                        $.each(result.errors, function (key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<li>' + value + '</li>');
                        });
                    } else {
                        toastr[result.status](result.message);
                        $('.alert-danger').hide();
                        $('#contactUs').modal('hide');
                        $('#contactUs form :input').val("");
                        $('#contactUs form textarea').val("");
                    }
                }
            })
        });

        $("#contactUs").on("hidden.bs.modal", function () {
            $('.alert-danger').hide();
            $('#contactUs form :input').val("");
            $('#contactUs form textarea').val("");
        });

    });
</script>

</body>

</html>
