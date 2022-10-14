@extends('frontend.layouts.index')

@section('title','Главная')

@section('vendor-styles')

@endsection

@section('page-styles')
    <!-- Light Box Css -->
    <link rel="stylesheet" href="/assets/libs/glightbox/css/glightbox.min.css">
@endsection

@section('content')



    <!-- START HOME -->
    <section class="bg-home3" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="mb-4 pb-3 me-lg-5">
                        <h6 class="sub-title">Нас уже 1500 человек</h6>
                        <h1 class="display-5 fw-semibold mb-3">С нами Ваши вещи найдутся и вернуться к Вам.</h1>
                        <p class="fs-18 text-muted mb-0">Закажи свой набор от бюро находок по QR-коду</p>
                    </div>

                </div>
                <!--end col-->
                <div class="col-lg-5">
                    <div class="mt-5 mt-lg-0 ms-xl-5">
                        <div class="quote-icon">
                            <i class="mdi mdi-format-quote-open icon"></i>
                            <i class="mdi mdi-format-quote-open icon-2 text-primary"></i>
                        </div>
                        <div class="swiper homeslider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="/assets/images/home/img-04.png" alt="" class="img-fluid rounded-3">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/assets/images/home/img-02.png" alt="" class="img-fluid rounded-3">
                                </div>
                                <div class="swiper-slide">
                                    <img src="/assets/images/home/img-03.png" alt="" class="img-fluid rounded-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- End Home -->




    <!-- START PROCESS -->
    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-title me-5">
                        <h3 class="title">Как это работает</h3>
                        <p class="text-muted">Инструкция очень простая и очевиданая.</p>
                        <div class="process-menu nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home"
                               role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <div class="d-flex">
                                    <div class="number flex-shrink-0">
                                        1
                                    </div>
                                    <div class="flex-grow-1 text-start ms-3">
                                        <h5 class="fs-18">В нашем офисе вы заказываете брелок</h5>
                                        <p class="text-muted mb-0">Due to its widespread use as filler text for layouts,
                                                                   non-readability
                                                                   is of great importance.</p>
                                    </div>
                                </div>
                            </a>
                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile"
                               role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                <div class="d-flex">
                                    <div class="number flex-shrink-0">
                                        2
                                    </div>
                                    <div class="flex-grow-1 text-start ms-3">
                                        <h5 class="fs-18">Заводим акаунт на нашем сайте</h5>
                                        <p class="text-muted mb-0">There are many variations of passages of
                                                                   avaibookmark-label, but the majority
                                                                   alteration in some form.</p>
                                    </div>
                                </div>
                            </a>
                            <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages"
                               role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                <div class=" d-flex">
                                    <div class="number flex-shrink-0">
                                        3
                                    </div>
                                    <div class="flex-grow-1 text-start ms-3">
                                        <h5 class="fs-18">Теряем</h5>
                                        <p class="text-muted mb-0">а кто то находит.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-6">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <img src="assets/images/process-01.png" alt="" class="img-fluid">
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                             aria-labelledby="v-pills-profile-tab">
                            <img src="assets/images/process-02.png" alt="" class="img-fluid">
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                             aria-labelledby="v-pills-messages-tab">
                            <img src="assets/images/process-03.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div> <!--end row-->
        </div><!--end container-->
    </section>
    <!-- END PROCESS -->

    <!--START CTA-->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center">
                        <h2 class="text-primary mb-4">Browse Our <span class="text-warning fw-bold">5,000+</span> Latest
                                                      Jobs</h2>
                        <p class="text-muted">Post a job to tell us about your project. We'll quickly match you with
                                              the right freelancers.</p>
                        <div class="mt-4 pt-2">
                            <a href="javascript:void(0)" class="btn btn-primary btn-hover">Started Now <i
                                        class="uil uil-rocket align-middle"></i></a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!--END CTA-->



    <!-- START BLOG -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-5">
                        <h3 class="title mb-3">Quick Career Tips</h3>
                        <p class="text-muted">Post a job to tell us about your project. We'll quickly match you with the
                                              right freelancers.</p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-box card p-2 mt-3">
                        <div class="blog-img position-relative overflow-hidden">
                            <img src="assets/images/blog/img-01.jpg" alt="" class="img-fluid">
                            <div class="bg-overlay"></div>
                            <div class="author">
                                <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)"
                                                                                               class="text-light user">Dirio
                                                                                                                       Walls</a>
                                </p>
                                <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 01 July, 2021</p>
                            </div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i
                                                    class="mdi mdi-heart-outline me-1"></i> 33</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i
                                                    class="mdi mdi-comment-outline me-1"></i> 08</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="javascript:void(0)" class="primary-link">
                                <h5 class="fs-17">How apps is the IT world ?</h5>
                            </a>
                            <p class="text-muted">The final text is not yet avaibookmark-label. Dummy texts have
                                                  Internet tend
                                                  been in use by typesetters.</p>
                            <a href="javascript:void(0)" class="form-text text-primary">Read more <i
                                        class="mdi mdi-chevron-right align-middle"></i></a>
                        </div>
                    </div><!--end blog-box-->
                </div><!--end col-->

                <div class="col-lg-4 col-md-6">
                    <div class="blog-box card p-2 mt-3">
                        <div class="blog-img position-relative overflow-hidden">
                            <img src="assets/images/blog/img-02.jpg" alt="" class="img-fluid">
                            <div class="bg-overlay"></div>
                            <div class="author">
                                <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)"
                                                                                               class="text-light user">Brandon
                                                                                                                       Carney</a>
                                </p>
                                <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 June, 2021</p>
                            </div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i
                                                    class="mdi mdi-heart-outline me-1"></i> 44</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i
                                                    class="mdi mdi-comment-outline me-1"></i> 25</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="javascript:void(0)" class="primary-link">
                                <h5 class="fs-17">Smartest Applications for Business ?</h5>
                            </a>
                            <p class="text-muted">Due to its widespread use as filler text for layouts, non-readability
                                                  is of great importance: human perception.</p>
                            <a href="javascript:void(0)" class="form-text text-primary">Read more <i
                                        class="mdi mdi-chevron-right align-middle"></i></a>
                        </div>
                    </div><!--end blog-box-->
                </div><!--end col-->

                <div class="col-lg-4 col-md-6">
                    <div class="blog-box card p-2 mt-3">
                        <div class="blog-img position-relative overflow-hidden">
                            <img src="assets/images/blog/img-03.jpg" alt="" class="img-fluid">
                            <div class="bg-overlay"></div>
                            <div class="author">
                                <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)"
                                                                                               class="text-light user">William
                                                                                                                       Mooneyhan</a>
                                </p>
                                <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 16 March, 2021
                                </p>
                            </div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i
                                                    class="mdi mdi-heart-outline me-1"></i> 68</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i
                                                    class="mdi mdi-comment-outline me-1"></i> 20</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="javascript:void(0)" class="primary-link">
                                <h5 class="fs-17">Design your apps in your own way ?</h5>
                            </a>
                            <p class="text-muted">One disadvantage of Lorum Ipsum is that in Latin certain letters
                                                  appear more frequently than others.</p>
                            <a href="javascript:void(0)" class="form-text text-primary">Read more <i
                                        class="mdi mdi-chevron-right align-middle"></i></a>
                        </div>
                    </div><!--end blog-box-->
                </div><!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- END BLOG -->

    <!-- START CLIENT -->
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="text-center p-3">
                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                           data-bs-original-title="Woocommerce">
                            <img src="assets/images/logo/logo-01.png" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-2">
                    <div class="text-center p-3">
                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                           data-bs-original-title="Envato">
                            <img src="assets/images/logo/logo-02.png" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-2">
                    <div class="text-center p-3">
                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                           data-bs-original-title="Magento">
                            <img src="assets/images/logo/logo-03.png" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-2">
                    <div class="text-center p-3">
                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                           data-bs-original-title="Wordpress">
                            <img src="assets/images/logo/logo-04.png" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-2">
                    <div class="text-center p-3">
                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                           data-bs-original-title="Generic">
                            <img src="assets/images/logo/logo-05.png" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="text-center p-3">
                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                           data-bs-original-title="Reveal">
                            <img src="assets/images/logo/logo-06.png" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </div>
    <!-- END CLIENT -->

    <!-- START APPLY MODAL -->
    <div class="modal fade" id="applyNow" tabindex="-1" aria-labelledby="applyNow" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <div class="text-center mb-4">
                        <h5 class="modal-title" id="staticBackdropLabel">Apply For This Job</h5>
                    </div>
                    <div class="position-absolute end-0 top-0 p-3">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="mb-3">
                        <label for="nameControlInput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nameControlInput" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="emailControlInput2" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailControlInput2" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="messageControlTextarea" class="form-label">Message</label>
                        <textarea class="form-control" id="messageControlTextarea" rows="4"
                                  placeholder="Enter your message"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="inputGroupFile01">Resume Upload</label>
                        <input type="file" class="form-control" id="inputGroupFile01">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Send Application</button>
                </div>
            </div>
        </div>
    </div><!-- END APPLY MODAL -->

    <!-- End Page-content -->
@endsection


{{-- vendor scripts --}}
@section('vendor-scripts')
    <!-- BEGIN: Page Vendor JS-->

    <!-- END: Page Vendor JS-->
@endsection

{{-- page scripts --}}
@section('page-scripts')
    <!-- Blog Init Js -->
    <script src="/assets/js/pages/blog-details.init.js"></script>

    <!-- Switcher Js -->
    <script src="/assets/js/pages/switcher.init.js"></script>

@endsection


