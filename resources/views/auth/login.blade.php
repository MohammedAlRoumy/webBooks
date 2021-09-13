<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('frontend/assets/dist/css/bootstrap.rtl.min.css')}}">
    <link href="{{asset('frontend/assets/dist/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/dist/css/fontawesome-stars.css')}}" rel="stylesheet">

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
                <a href="" class=" text-dark text-decoration-none"><img src="{{asset('frontend/assets/dist/images/logo.png')}}" alt="" width="80"></a>
            </span>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">الكتب</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">المؤلفون</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">التصنيفات</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            المزيد
                        </a>
                        <ul class="dropdown-menu mt-2" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item border-bottom" href="#"> المدونة </a></li>
                            <li><a class="dropdown-item border-bottom" href="#"> انشر معنا </a></li>
                            <li><a class="dropdown-item border-bottom" href="#"> مهمتنا </a></li>
                            <li><a class="dropdown-item " href="#"> اتصل بنا </a></li>

                        </ul>
                    </li>

                </ul>

                <ul class="navbar-nav d-flex">
                    <li class="nav-item"><a href="#" class="nav-link link-dark px-2 "> دخول <i
                            class="fa fa-lock"></i></a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-dark px-2 "> تسجيل
                        <i class="fa fa-user-plus"></i></a></li>
                </ul>


            </div>
        </div>
    </nav>
    <!--        </div>-->
</header>
<div class="container  pt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">الفرعية1</a></li>
            <li class="breadcrumb-item active" aria-current="page">الفرعية</li>
        </ol>
    </nav>
</div>

<section class="login-section pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-around g-3">
            <div class="col-md-5">
                <div class="card  shadow mb-5 bg-white rounded">
                    <div class="card-header border-4 border-primary">
                        <h6>تسجيل دخول</h6>
                    </div>
                    <div class="card-body">
                        <form class="" action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">البريد الالكتروني</label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">تذكرني</label>
                                </div>
                                <button type="submit" class="btn btn-primary">تسجيل دخول</button>
                            </div>
                            <hr>
                            <div class=" d-flex flex-wrap justify-content-center align-items-center mt-4">
                                <button type="submit" class="btn btn-primary"> دخول عبر فيسبوك <i
                                        class="fa fa-facebook"></i>
                                </button>
                            </div>

                            <div class="d-flex flex-wrap justify-content-between mt-3">
                                <p class="mt-2"><a href="forgot-password.html"
                                                   class="text-primary text-decoration-none">نسيت كلمة
                                    المرور؟</a></p>

                                <p class="mt-2"><a href="{{route('register')}}" class="text-primary text-decoration-none">ليس
                                    لديك
                                    حساب؟</a></p>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
            <div class="col-md-7">
                <img src="{{asset('frontend/assets/dist/images/book_lover.png')}}" alt="" width="100%">
            </div>
        </div>
    </div>
</section>


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
                    <li><a href="#contactUs" data-bs-toggle="modal" class="text-decoration-none text-white"><i class="fa fa-link"></i> اتصل بنا</a></li>
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
            <div class="modal-body">
                <form class="">
                    <div class="mb-2">
                        <label for="name" class="form-label">الاسم</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail12" class="form-label">البريد الالكتروني</label>
                        <input type="email" class="form-control" id="exampleInputEmail12" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="title" class="form-label">عنوان الرسالة</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="mb-2">
                        <label for="message" class="form-label">محتوى الرسالة</label>
                        <textarea class="form-control" id="message"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-primary">إرسال</button>
            </div>
        </div>
    </div>
</div>
<!--end contact us modal-->

<script src="{{asset('frontend/assets/dist/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend/assets/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/dist/js/jquery.barrating.min.js')}}"></script>
<script type="text/javascript">
    $(function () {
        $('.example').barrating({
            theme: 'fontawesome-stars'
        });
    });
</script>
</body>

</html>
