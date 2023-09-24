@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Пользователи')
{{-- vendor style --}}
@section('vendor-styles')

    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
{{-- page style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')

    <!-- account setting page start -->
    <section id="page-account-settings">
        @if(session('success'))
            <div class="alert bg-rgba-success alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center">
                    <i class="bx bx-like"></i>
                    <span>  {{session('success')}}  </span>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert bg-rgba-danger alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center">
                    <i class="bx bx-error"></i>
                    <span>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </span>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- left menu section -->
                    <!-- right content section -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                             aria-labelledby="account-pill-general" aria-expanded="true">
                                            <form
                                                action="{{ (isset($user->id))? route('user.update',$user->id):route('user.store')  }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @if(isset($user->id))
                                                    @method('PUT')
                                                @endif
                                                <div class="media">

                                                    <a href="javascript: void(0);">
                                                        <img
                                                            src="{{ Storage::url('/avatars/300/'.(!empty($user->foto)?$user->foto:'000.png')) }}"
                                                            class="rounded mr-75" alt="profile image" height="64">
                                                    </a>
                                                    <div class="media-body mt-25">
                                                        <div
                                                            class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label for="select-files"
                                                                   class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                                                                <span>Загрузить фото</span>
                                                                <input id="select-files" type="file" name="image"
                                                                       hidden>
                                                            </label>
                                                            <button type="submit" name="reset_foto" value="1"
                                                                    class="btn btn-sm btn-light-secondary ml-50">
                                                                Сбросить
                                                            </button>
                                                        </div>
                                                        <p class="text-muted ml-1 mt-50">
                                                            <small>Допускаются фото .jpg , .bmp , .png</small></p>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Логин</label>
                                                                <input type="text" class="form-control" name="login"
                                                                       value="{{old('login',$user->login)}}" required
                                                                       @isset($user->id) readonly @endisset >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Пароль</label>
                                                                <input type="text" class="form-control" name="password"
                                                                       @empty($user->id) required @endempty >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Имя</label>
                                                                <input type="text" class="form-control" name="name"
                                                                       value="{{old('name',$user->name)}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Город</label>
                                                                <input type="text" class="form-control" name="city"
                                                                       value="{{old('city',$user->city)}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Телефон</label>
                                                            <input type="text" class="form-control" name="tel"
                                                                   value="{{old('tel',$user->tel)}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Телефон рабочий</label>
                                                            <input type="text" class="form-control" name="tel2"
                                                                   value="{{old('tel2',$user->tel2)}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Телефон экстренный </label>
                                                            <input type="text" class="form-control" name="tel_alert"
                                                                   value="{{old('tel_alert',$user->tel_alert)}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>E-mail</label>
                                                                <input type="email" class="form-control" name="email"
                                                                       value="{{old('email',$user->email)}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Инстаграмм</label>
                                                            <input type="text" class="form-control" name="instagram"
                                                                   value="{{old('instagram',$user->instagram)}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>ВК</label>
                                                            <input type="text" class="form-control" name="vk"
                                                                   value="{{old('vk',$user->vk)}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <h6 class="m-1">Уведомления</h6>
                                                        <div class="row ml-2">
                                                            <div class="col-6 mb-1">
                                                                <div
                                                                    class="custom-control custom-switch custom-control-inline">
                                                                    <input type="checkbox" name="notify_tel"
                                                                           class="custom-control-input"
                                                                           id="accountSwitchTel" {{ $user->notify_tel  ? 'checked' : '' }}>
                                                                    <label class="custom-control-label mr-1"
                                                                           for="accountSwitchTel"></label>
                                                                    <span class="switch-label w-100">Уведомление по телефону</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mb-1">
                                                                <div
                                                                    class="custom-control custom-switch custom-control-inline">
                                                                    <input type="checkbox" name="notify_sms"
                                                                           class="custom-control-input"
                                                                           id="accountSwitchSms" {{ $user->notify_sms  ? 'checked' : '' }}>
                                                                    <label class="custom-control-label mr-1"
                                                                           for="accountSwitchSms"></label>
                                                                    <span
                                                                        class="switch-label w-100">Уведомление по СМС</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mb-1">
                                                                <div
                                                                    class="custom-control custom-switch custom-control-inline">
                                                                    <input type="checkbox" name="notify_email"
                                                                           class="custom-control-input"
                                                                           id="accountSwitchEmail" {{ $user->notify_email  ? 'checked' : '' }} >
                                                                    <label class="custom-control-label mr-1"
                                                                           for="accountSwitchEmail"></label>
                                                                    <span class="switch-label w-100">Уведомление по Email</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mb-1">
                                                                <div
                                                                    class="custom-control custom-switch custom-control-inline">
                                                                    <input type="checkbox" name="notify_whatsup"
                                                                           class="custom-control-input"
                                                                           id="accountSwitchwhatsup" {{ $user->notify_whatsup  ? 'checked' : '' }} >
                                                                    <label class="custom-control-label mr-1"
                                                                           for="accountSwitchwhatsup"></label>
                                                                    <span class="switch-label w-100">Уведомление по Whats Up</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mb-1">
                                                                <div
                                                                    class="custom-control custom-switch custom-control-inline">
                                                                    <input type="checkbox" name="notify_telegram"
                                                                           class="custom-control-input"
                                                                           id="accountSwitchtelegram" {{ $user->notify_telegram  ? 'checked' : '' }} >
                                                                    <label class="custom-control-label mr-1"
                                                                           for="accountSwitchtelegram"></label>
                                                                    <span class="switch-label w-100">Уведомление по Telegram </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" name="redirect" value="apply"
                                                                class="btn btn-primary glow mr-sm-1 mb-1">
                                                            Применить
                                                        </button>

                                                        <button type="submit" name="redirect" value="saveadd"
                                                                class="btn btn-primary glow mr-sm-1 mb-1">
                                                            Сохранить & Добавить
                                                        </button>

                                                        <button type="submit" name="redirect" value="delete"
                                                                class="btn btn-danger glow mr-sm-1 mb-1">
                                                            Удалить
                                                        </button>

                                                        <button type="submit" name="redirect" value="cancel"
                                                                class="btn btn-light glow mr-sm-1 mb-1">
                                                            Отменить
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
    <!-- account setting page ends -->

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
                @isset($logs)
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
                                <small class="text-muted">{{$log->created_at->format('H:i:s   d-m-Y ')}}</small></td>
                            <td>
                                <div class="@if ($log->result == "error") text-danger @endif  ">{{$log->subject}}</div>
                                <small
                                    class="">{{Str::replace('http://xn----7sbaba3a8b9acil0ei1h.xn--p1ai', '', $log->url)}}</small>
                            </td>
                            <td>
                                <span class="bullet bullet-success bullet-sm"></span>
                                <small class="text-muted">{{$log->ip}}</small>
                            </td>
                            <td><span class="badge badge-light-danger badge-pill">{{$log->method}}</span></td>
                            <td>
                                <div class="invoice-action">
                                    Браузер: {{Str::limit($log->agent, 80) }}<br> Переменные: {{$log->parametrs}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endisset
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
    <script src="/adm/app-assets/js/scripts/datatables/datatable.js"></script>
    <script src="{{asset('/adm/app-assets/js/scripts/cards/widgets.js')}}"></script>
    <script src="/adm/app-assets/js/app-invoice-log.js"></script>

@endsection
