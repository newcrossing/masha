@extends('backend.layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Главная')
{{-- vendor scripts --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/vendors/css/extensions/dragula.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('/adm/app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/vendors/css/extensions/swiper.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/widgets.css')}}">
@endsection
@section('content')

    <!-- Widgets Statistics start -->
    <section id="widgets-Statistics">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <h4>Слайды</h4>
                <hr>
            </div>
        </div>

        <!-- Basic File Browser start -->
        <form action="{{ route('slider.store')  }}" method="POST" enctype="multipart/form-data">
            @csrf
            <section id="input-file-browser">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Добавить фото</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <button type="submit" name="redirect" value="save"
                                                    class="btn btn-primary glow mr-sm-1 mb-1">
                                                Добавить
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
        <!-- Basic File Browser end -->
        <div class="row">
            @foreach ($sliders as $slide)
                <div class="col-xl-4 col-md-4 col-sm-6">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mx-auto my-1">
                                    <img src="{{ Storage::url('/sliders/400/'.$slide->file) }}" width="100%">
                                </div>
                                <p class="text-muted mb-0 line-ellipsis">
                                    <a class="todo-item-favorite ml-75"><i class="bx bx-star"></i></a>
                                    <a class="todo-item-delete ml-75" href=""><i class="bx bx-trash"></i></a>
                                </p>
                                <h2 class="mb-0"></h2>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </section>
    <!-- Widgets Statistics End -->



@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="{{asset('/adm/app-assets/vendors/js/pickers/daterange/moment.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/extensions/dragula.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script src="{{asset('/adm/app-assets/js/scripts/cards/widgets.js')}}"></script>
@endsection