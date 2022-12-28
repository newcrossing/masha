@extends('frontend.layouts.index')

@section('title','Главная')

@section('vendor-styles')

@endsection

@section('page-styles')
    <link rel="stylesheet" href="/assets/libs/glightbox/css/glightbox.min.css">
@endsection

@section('content')
    <!-- START HOME -->
    <section class="bg-home3" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="mb-4 pb-3 me-lg-5">
                        <h6 class="sub-title">Нас уже {{$users_chek + 1000}} человек</h6>
                        <h1 class="display-5 fw-semibold mb-3">{!! \App\Models\Content::where('type', 'slidertext1')->first()->text!!}</h1>
                        <p class="fs-18 text-muted mb-0">{!! \App\Models\Content::where('type', 'slidertext2')->first()->text!!}</p>

                        <a href="#signupModal" data-bs-toggle="modal" class="btn btn-danger">Заказать набор с доставкой
                            <i class="uil uil-message ms-1"></i></a>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-4">
                    <div class="mt-4 mt-lg-0 ms-xl-4">
                        <div class="quote-icon">

                        </div>
                        <div class="swiper blogdetailSlider">
                            <div class="swiper-wrapper">
                                @foreach ($sliders as $slider)
                                    <div class="swiper-slide">
                                        <img src="{{ Storage::url('/sliders/400/'.$slider->file) }}" style="width: 100%"
                                             alt=""
                                             class="img-fluid rounded-3">
                                    </div>
                                @endforeach
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
    <section class="section" style="padding-top: 50px">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-title me-5">
                        <h3 class="title">Как это работает</h3>
                        <p class="text-muted">Инструкция очень простая и очевидная.</p>
                        <div class="process-menu nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            @foreach (\App\Models\Step::where('active', 1)->orderBy('number')->get() as $step)
                                <a class="nav-link @if ($loop->first) active @endif" id="v-pills-{{$step->id}}-tab" data-bs-toggle="pill" href="#v-pills-{{$step->id}}"
                                   role="tab" aria-controls="v-pills-{{$step->id}}" aria-selected="true">
                                    <div class="d-flex">
                                        <div class="number flex-shrink-0">{{$step->number}}</div>
                                        <div class="flex-grow-1 text-start ms-3">
                                            <h5 class="fs-18">{{$step->name}}</h5>
                                            <p class="text-muted mb-0"> {{$step->text}}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-6">
                    <div class="tab-content" id="v-pills-tabContent">
                        @foreach (\App\Models\Step::where('active', 1)->orderBy('number')->get() as $step)
                            <div class="tab-pane fade show @if ($loop->first) active @endif" id="v-pills-{{$step->id}}" role="tabpanel" aria-labelledby="v-pills-{{$step->id}}-tab">
                                @if($step->id)
                                    <img src="{{ Storage::url('/steps/'.$step->image) }}" alt="" class="img-fluid">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> <!--end row-->
        </div><!--end container-->
    </section>

    <!-- END PROCESS -->

@endsection

@section('vendor-scripts')
@endsection

@section('page-scripts')
    @parent
    <script src="/assets/js/pages/blog-details.init.js"></script>
@endsection


