@extends('site.site')
@section('content')
    <section class="banner">
        <div class="container">
            <div class="content p-5">
                <div class="banner-title text-center pt-5 pr-2 pl-2 pb-3">
                    <h2>الفضول أحد الخصائص الدائمة والأكيدة للعقل النشيط</h2>
                </div>
                <div class="search d-flex pt-4">
                    <input class="form-control me-2" type="search" placeholder="بحث..." aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">بحث</button>
                </div>
            </div>
        </div>
    </section>

    <section class="main pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card mb-5">
                        <div class="card-header">
                            <h5><a href="" class="text-decoration-none text-dark">التصنيفات</a></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="" class="text-decoration-none text-dark">An item</a>
                            </li>
                            <li class="list-group-item"><a href="" class="text-decoration-none text-dark">A second
                                    item</a>
                            </li>
                            <li class="list-group-item"><a href="" class="text-decoration-none text-dark">A third
                                    item</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="books mb-5">
                        <div class="row pb-4">
                            <div class="col-md-12">
                                <h4 class=" float-start pb-2 border-3 border-primary border-bottom">أحدث الكتب </h4>
                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-4">

                            <div class="col">
                                <div class="card">
                                    <img src="assets/dist/images/1.png" class="card-img-top" alt="..." height="241"
                                         width="171">
                                    <div class="card-body">
                                        <h6 class="card-title">عنوان الكتاب</h6>
                                        <div class="line">
                                            <hr>
                                        </div>
                                        <div class="d-flex justify-content-between like pb-2">
                                        <span class="float-start" data-bs-toggle="tooltip"
                                              data-bs-placement="top" title="تحميل"><i
                                                class="fa fa-download"></i> 55</span>
                                            <span class="float-end" data-bs-toggle="tooltip"
                                                  data-bs-placement="top" title="إضافة للمفضلة"><i
                                                    class="fa fa-bookmark text-danger"></i></span>
                                        </div>
                                        <div class="container d-flex justify-content-center mt-100">
                                            <select class="example">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="assets/dist/images/1.png" class="card-img-top" alt="..." height="241"
                                         width="171">
                                    <div class="card-body">
                                        <h6 class="card-title">عنوان الكتاب</h6>
                                        <div class="line">
                                            <hr>
                                        </div>
                                        <div class="d-flex justify-content-between like pb-2">
                                        <span class="float-start" data-bs-toggle="tooltip"
                                              data-bs-placement="top" title="تحميل"><i
                                                class="fa fa-download"></i> 55</span>
                                            <span class="float-end" data-bs-toggle="tooltip"
                                                  data-bs-placement="top" title="إضافة للمفضلة"><i
                                                    class="fa fa-bookmark text-danger"></i></span>
                                        </div>
                                        <div class="container d-flex justify-content-center mt-100">
                                            <select class="example">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="assets/dist/images/1.png" class="card-img-top" alt="..." height="241"
                                         width="171">
                                    <div class="card-body">
                                        <h6 class="card-title">عنوان الكتاب</h6>
                                        <div class="line">
                                            <hr>
                                        </div>
                                        <div class="d-flex justify-content-between like pb-2">
                                        <span class="float-start" data-bs-toggle="tooltip"
                                              data-bs-placement="top" title="تحميل"><i
                                                class="fa fa-download"></i> 55</span>
                                            <span class="float-end" data-bs-toggle="tooltip"
                                                  data-bs-placement="top" title="إضافة للمفضلة"><i
                                                    class="fa fa-bookmark-o"></i></span>
                                        </div>
                                        <div class="container d-flex justify-content-center mt-100">
                                            <select class="example">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="assets/dist/images/1.png" class="card-img-top" alt="..." height="241"
                                         width="171">
                                    <div class="card-body">
                                        <h6 class="card-title">عنوان الكتاب</h6>
                                        <div class="line">
                                            <hr>
                                        </div>
                                        <div class="d-flex justify-content-between like pb-2">
                                        <span class="float-start" data-bs-toggle="tooltip"
                                              data-bs-placement="top" title="تحميل"><i
                                                class="fa fa-download"></i> 55</span>
                                            <span class="float-end" data-bs-toggle="tooltip"
                                                  data-bs-placement="top" title="إضافة للمفضلة"><i
                                                    class="fa fa-bookmark-o"></i></span>
                                        </div>
                                        <div class="container d-flex justify-content-center mt-100">
                                            <select class="example">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="books mb-5">
                        <div class="row pb-4">
                            <div class="col-md-12">
                                <h4 class=" float-start pb-2 border-3 border-primary border-bottom"> الكتب الاكثر
                                    تحميلا</h4>
                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-4">

                            <div class="col">
                                <div class="card">
                                    <img src="assets/dist/images/1.png" class="card-img-top" alt="..." height="241"
                                         width="171">
                                    <div class="card-body">
                                        <h6 class="card-title">عنوان الكتاب</h6>
                                        <div class="line">
                                            <hr>
                                        </div>
                                        <div class="d-flex justify-content-between like pb-2">
                                        <span class="float-start" data-bs-toggle="tooltip"
                                              data-bs-placement="top" title="تحميل"><i
                                                class="fa fa-download"></i> 55</span>
                                            <span class="float-end" data-bs-toggle="tooltip"
                                                  data-bs-placement="top" title="إضافة للمفضلة"><i
                                                    class="fa fa-bookmark text-danger"></i></span>
                                        </div>
                                        <div class="container d-flex justify-content-center mt-100">
                                            <select class="example">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="assets/dist/images/1.png" class="card-img-top" alt="..." height="241"
                                         width="171">
                                    <div class="card-body">
                                        <h6 class="card-title">عنوان الكتاب</h6>
                                        <div class="line">
                                            <hr>
                                        </div>
                                        <div class="d-flex justify-content-between like pb-2">
                                        <span class="float-start" data-bs-toggle="tooltip"
                                              data-bs-placement="top" title="تحميل"><i
                                                class="fa fa-download"></i> 55</span>
                                            <span class="float-end" data-bs-toggle="tooltip"
                                                  data-bs-placement="top" title="إضافة للمفضلة"><i
                                                    class="fa fa-bookmark text-danger"></i></span>
                                        </div>
                                        <div class="container d-flex justify-content-center mt-100">
                                            <select class="example">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="assets/dist/images/1.png" class="card-img-top" alt="..." height="241"
                                         width="171">
                                    <div class="card-body">
                                        <h6 class="card-title">عنوان الكتاب</h6>
                                        <div class="line">
                                            <hr>
                                        </div>
                                        <div class="d-flex justify-content-between like pb-2">
                                        <span class="float-start" data-bs-toggle="tooltip"
                                              data-bs-placement="top" title="تحميل"><i
                                                class="fa fa-download"></i> 55</span>
                                            <span class="float-end" data-bs-toggle="tooltip"
                                                  data-bs-placement="top" title="إضافة للمفضلة"><i
                                                    class="fa fa-bookmark-o"></i></span>
                                        </div>
                                        <div class="container d-flex justify-content-center mt-100">
                                            <select class="example">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="assets/dist/images/1.png" class="card-img-top" alt="..." height="241"
                                         width="171">
                                    <div class="card-body">
                                        <h6 class="card-title">عنوان الكتاب</h6>
                                        <div class="line">
                                            <hr>
                                        </div>
                                        <div class="d-flex justify-content-between like pb-2">
                                        <span class="float-start" data-bs-toggle="tooltip"
                                              data-bs-placement="top" title="تحميل"><i
                                                class="fa fa-download"></i> 55</span>
                                            <span class="float-end" data-bs-toggle="tooltip"
                                                  data-bs-placement="top" title="إضافة للمفضلة"><i
                                                    class="fa fa-bookmark-o"></i></span>
                                        </div>
                                        <div class="container d-flex justify-content-center mt-100">
                                            <select class="example">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="books mb-5">
                        <div class="row pb-4">
                            <div class="col-md-12">
                                <h4 class=" float-start pb-2 border-3 border-primary border-bottom"> الكتب الاعلى
                                    تقييماً</h4>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-4 g-4">
                            <div class="col">
                                <div class="card">
                                    <img src="assets/dist/images/1.png" class="card-img-top" alt="..." height="241"
                                         width="171">
                                    <div class="card-body">
                                        <h6 class="card-title">عنوان الكتاب</h6>
                                        <div class="line">
                                            <hr>
                                        </div>
                                        <div class="d-flex justify-content-between like pb-2">
                                        <span class="float-start" data-bs-toggle="tooltip"
                                              data-bs-placement="top" title="تحميل"><i
                                                class="fa fa-download"></i> 55</span>
                                            <span class="float-end" data-bs-toggle="tooltip"
                                                  data-bs-placement="top" title="إضافة للمفضلة"><i
                                                    class="fa fa-bookmark"></i></span>
                                        </div>
                                        <div class="container d-flex justify-content-center mt-100">
                                            <select class="example">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
