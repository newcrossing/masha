@extends('frontend.layouts.index')

@section('title','Изменение объявления')

@section('vendor-styles')

@endsection


@section('page-styles')
    <!-- Light Box Css -->
    <link rel="stylesheet" href="/assets/libs/glightbox/css/glightbox.min.css">
@endsection

@section('content')
    <!-- Start home -->
    <section class="page-title-box">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h3 class="mb-4">Мое объявление</h3>
                        <div class="page-next">
                            <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item active" aria-current="page">Редактирование</li>
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
                <path fill="#FFFFFF" fill-opacity="1" d="M0,192L120,202.7C240,213,480,235,720,234.7C960,235,1200,213,1320,202.7L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
            </svg>
        </div>
    </div>
    <!-- END SHAPE -->

    <!-- START PROFILE -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card profile-sidebar me-lg-4">
                        <div class="card-body p-4">
                            <div class="text-center pb-4 border-bottom">
                                <h5 class="mb-0">Фотографии </h5>
                            </div>
                            <ul class="widget-popular-post list-unstyled my-4">
                                @foreach($board->fotos as $foto)
                                    <li class="d-flex mb-3 align-items-center pb-3 border-bottom">
                                        <img src="{{ Storage::url('/boards/200/'.$foto->file) }}" alt="" class="rounded"
                                             style="width: 80px">
                                        <div class="flex-grow-1 text-truncate ms-3">
                                            <a href="{{route('foto.delete',$foto->id)}}" class="text-dark">
                                                <span class="badge bg-danger">
                                                    <i class="uil uil-trash-alt"></i>
                                                </span>
                                            </a>
                                            <span class="d-block text-muted fs-14">{{$foto->file}}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            {{-- {!! QrCode::size(300)->color(255, 0, 0)->style('dot')->eye('circle')->encoding('UTF-8')->generate('https://маша-растеряша.рф/'.$board->slug) !!} --}}
                         </div>
                         <!--end card-body-->
                     </div>
                     <!--end profile-sidebar-->
                 </div>


                 <!--end col-->
                 <div class="col-lg-8">
                     @if(session('success'))
                         <div class="alert  bg-soft-success" role="alert">
                             {{session('success')}}
                         </div>
                     @endif


                     <form action="{{ (isset($board->id))? route('board.update',$board->id):route('board.insert')  }}"
                           method="POST" enctype="multipart/form-data">
                         @csrf
                         @if(isset($board->id))
                             {{--@method('PUT')--}}
                        @endif
                        <div>
                            <h5 class="fs-17 fw-semibold mb-3 mb-0">Основное</h5>

                            <div class="row">
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="attachmentscv" class="form-label">Прикрепите фото</label> <input
                                            class="form-control" type="file" name="image" id="attachmentscv"
                                            accept="image/png, image/bmp, image/jpeg"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Название</label> <input type="text"
                                                                                                     class="form-control"
                                                                                                     name="name"
                                                                                                     value="{{$board->name}}"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">Вознаграждение</label> <input type="number"
                                                                                                           class="form-control"
                                                                                                           name="money"
                                                                                                           value="{{$board->money}}"/>
                                    </div>
                                </div>

                                <!--end col-->


                            </div>
                            <!--end row-->
                        </div>
                        <div class="mt-4">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="text"
                                                  rows="5">{{$board->text}}</textarea>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>


                        <!--end Change-password-->
                        <div class="mt-4 text-end">
                            <button type="submit"
                                    class="btn btn-primary"> {{ (isset($board->id))? 'Изменить':'Создать'  }}</button>
                            @isset($board->id)
                                <a href="{{route('qr',$board->slug)}}" target="_blank" class="btn btn-success">Просмотреть
                                    <i class="mdi mdi-send"></i></a>
                            @endisset
                        </div>
                    </form>
                </div>

                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- END PROFILE -->

@endsection



@section('vendor-scripts')

@endsection

@section('page-scripts')
    <!-- Light Box Js -->
    <script src="/assets/libs/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/js/pages/lightbox.init.js"></script>
@endsection

