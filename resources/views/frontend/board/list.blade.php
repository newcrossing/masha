@extends('frontend.layouts.index')

@section('title','Мои объявления')

@section('content')

    <!-- Start home -->
    <section class="page-title-box">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h3 class="mb-4">Мои потеряшки</h3>
                        <div class="page-next">
                            <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                                    <li class="breadcrumb-item active" aria-current> Мои потеряшки</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- end home -->

    <!-- START SHAPE -->
    <div class="position-relative" style="z-index: 1">
        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
                <path fill="#FFFFFF" fill-opacity="1"
                      d="M0,192L120,202.7C240,213,480,235,720,234.7C960,235,1200,213,1320,202.7L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
            </svg>
        </div>
    </div>
    <!-- END SHAPE -->

    <!-- START JOB-LIST -->
    <section class="section">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="candidate-list">
                        @foreach ($boards as $board)
                            <div class="candidate-list-box card mt-4">
                                <div class="card-body p-4">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="candidate-list-images">
                                                @foreach ($board->fotos as $foto)
                                                    <img src="{{ Storage::url('/boards/200/'.$foto->file) }}" alt=""
                                                         class="avatar-md img-thumbnail rounded-circle">
                                                    @break
                                                @endforeach
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-5">
                                            <div class="candidate-list-content mt-3 mt-lg-0">
                                                <h5 class="fs-19 mb-0">
                                                    <a href="{{route('board.single',$board->id)}}"
                                                       class="primary-link">{{$board->name}}</a>

                                                </h5>
                                                <a href="{{route('board.edit',$board->id)}}"><i class="uil uil-edit bg-soft-success fs-18"></i> изменить</a>
                                                <p class="text-muted mb-2"> Опубликовано 10 сентября 2022</p>
                                                <ul class="list-inline mb-0 text-muted">
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-map-marker"></i> {{$board->city}}
                                                    </li>
                                                    @if ($board->money)
                                                        <li class="list-inline-item">
                                                            <i class="uil uil-wallet"></i>
                                                            вознаграждение {{$board->money}} р.
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div><!--end col-->

                                    </div><!--end row-->
                                    <div class="favorite-icon">

                                        <a href="{{route('board.edit',$board->id)}}"><i class="uil uil-edit bg-soft-success fs-18"></i> изменить</a>
                                    </div>
                                </div>
                            </div><!--end card-->
                        @endforeach
                    </div><!--end candidate-list-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- END JOB-LIST -->
@endsection






