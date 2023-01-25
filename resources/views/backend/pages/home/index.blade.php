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
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/app-invoice.css')}}">
@endsection
@section('content')
    <!-- Widgets Statistics start -->
    <section id="widgets-Statistics">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <h4>Пользователи </h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">
                                <i class="bx bx-user font-medium-5"></i>
                            </div>
                            <p class="text-muted mb-0 line-ellipsis">
                                <a href="{{route('user.index')}}"> Всего пользователей</a>
                            </p>
                            <h2 class="mb-0">
                                {{$users}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-1">
                                <i class="bx bx-user-check font-medium-5"></i>
                            </div>
                            <p class="text-muted mb-0 line-ellipsis">Активированные </p>
                            <h2 class="mb-0">{{$users_chek}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
                                <i class="bx bx-user-minus font-medium-5"></i>
                            </div>
                            <p class="text-muted mb-0 line-ellipsis">Неактивированные </p>
                            <h2 class="mb-0">{{$users_no_chek}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Widgets Statistics End -->

    <!-- invoice list -->
    <section class="invoice-list-wrapper">
        <!-- Options and filter dropdown button-->
        <div class="table-responsive">
            <table class="table invoice-data-table dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>
                        <span class="align-middle">#ID</span>
                    </th>
                    <th>Дата</th>
                    <th>Действие</th>
                    <th>IP</th>
                    <th>Метод</th>
                    <th>Параметры</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="">{{$log->id }}</a>
                        </td>
                        <td>
                            @isset($log->user_login)
                                <div class="badge badge-primary d-inline-flex align-items-center mr-1 mb-1">
                                    <i class="bx bx-user    font-size-small mr-25"></i>
                                    <span>{{$log->user_login}}</span>
                                </div>
                            @endisset <br>
                            <small class="text-muted">{{$log->created_at->format('H:m:s   d-m-Y ')}}</small></td>
                        <td>
                            <div class="@if ($log->result == "error") text-danger @endif  ">{{$log->subject}}</div>
                            <small class="">{{Str::replace('http://xn----7sbaba3a8b9acil0ei1h.xn--p1ai', '', $log->url)}}</small>
                        </td>
                        <td>
                            <span class="bullet bullet-success bullet-sm"></span>
                            <small class="text-muted">{{$log->ip}}</small>
                        </td>
                        <td><span class="badge badge-light-danger badge-pill">{{$log->method}}</span></td>
                        <td>
                            <div class="invoice-action">
                                Браузер: {{Str::limit($log->agent, 80) }}<br>  Переменные: {{$log->parametrs}}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>



@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="/adm/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>

    <script src="/adm/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/responsive.bootstrap.min.js"></script>

    <script src="{{asset('/adm/app-assets/vendors/js/pickers/daterange/moment.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/extensions/dragula.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script src="{{asset('/adm/app-assets/js/scripts/cards/widgets.js')}}"></script>
    <script src="/adm/app-assets/js/app-invoice-log.js"></script>
@endsection
