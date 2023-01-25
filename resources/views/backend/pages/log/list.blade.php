@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Логирование')
{{-- vendor style --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection
{{-- page style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/extensions/sweetalert2.min.css">

    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')


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
@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script src="/adm/app-assets/js/app-invoice-log.js"></script>
@endsection
