@extends('frontend.layouts.index')

@section('title','Мой профиль')

@section('vendor-styles')
@endsection

@section('page-styles')
    <!-- Light Box Css -->
    <link rel="stylesheet" href="/assets/libs/glightbox/css/glightbox.min.css">
@endsection

@section('content')
    <!-- Start home -->
    <section class="page-title-box" style="padding-top: 200px; padding-bottom: 90px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h3 class="mb-4">Мой профиль</h3>
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


    <!-- START PROFILE -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card profile-sidebar me-lg-4">
                        <div class="card-body p-4">
                            <div class="text-center pb-4 border-bottom">
                                <img src="{{ Storage::url('/avatars/300/'.Auth::user()->getFoto()) }}"
                                     class="avatar-lg img-thumbnail  mb-4" style="height: auto; width: 10rem">
                                <h5 class="mb-0">{{Auth::user()->name}}</h5>
                                <p class="text-muted">#{{Auth::user()->login}}</p>
                            </div>
                            <!--end profile-->
                            <div class="candidate-contact-details card-body border-bottom  p-4 border-top">
                                <h6 class="fs-17 fw-semibold mb-3">Контакты</h6>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <div class="d-flex align-items-center mt-4">
                                            <div class="icon bg-soft-primary flex-shrink-0">
                                                <i class="uil uil-envelope-alt"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="fs-14 mb-1">E-mail</h6>
                                                <p class="text-muted mb-0">{{Auth::user()->email}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center mt-4">
                                            <div class="icon bg-soft-primary flex-shrink-0">
                                                <i class="uil uil-phone"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="fs-14 mb-1">Телефон</h6>
                                                <p class="text-muted mb-0">{{Auth::user()->tel}}</p>
                                                <p class="text-muted mb-0">{{Auth::user()->tel2}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center mt-4">
                                            <div class="icon bg-soft-primary flex-shrink-0">
                                                <i class="uil uil-map-marker"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="fs-14 mb-1">Город</h6>
                                                <p class="text-muted mb-0">{{Auth::user()->city}}</p>
                                            </div>
                                        </div>
                                    </li>


                                </ul>
                            </div>
                            <div class="text-center pb-4 border-bottom mt-4">
                                @if(Storage::exists('/public/qr/' . Auth::user()->login . '.png'))
                                    <img src="{{ Storage::url('/qr/'.Auth::user()->login . '.png') }}"
                                         class="avatar-lg img-thumbnail " style="height: auto; width: 10rem">

                                    <p class="text-muted">
                                        <a href="{{route('qr-download',Auth::user()->login . '.png')}}">
                                        <span class="badge bg-success">
                                            <i class="uil uil-image-download"></i>  Скачать</span>
                                        </a>
                                    </p>
                                @endif

                                @if(isset(Auth::user()->tel) || isset(Auth::user()->email) )
                                    <a href="{{route('vcard',Auth::user()->board->slug)}}"
                                       class="btn btn-outline-success btn-sm w-100 mt-2">
                                        <i class="uil uil-postcard"></i> Скачать электронную визитку
                                    </a>
                                @endif
                            </div>
                            <!--end contact-details-->
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

                    @if ($errors->any())
                        <div class="alert  bg-soft-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif


                    <form action="{{route('profile.settings')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            {{--                            <h5 class="fs-17 fw-semibold mb-3 mb-0">Мой профиль #{{Auth::user()->login}}</h5>--}}
                            @if (!Auth::user()->email || !Auth::user()->last_password)
                                <div class="alert  bg-soft-danger" role="alert">
                                    <br>
                                    Для начала публикации объявления необходимо:<br>
                                    @empty(Auth::user()->email)
                                        - указать e-mail.
                                        <br>
                                    @endempty

                                    @empty(Auth::user()->last_password)
                                        - назначить новый пароль или установить чекбокс "Оставить старый пароль"
                                        <br>
                                    @endempty
                                    <br>
                                </div>
                            @endif

                            <nav class="mb-4">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                            aria-selected="true"><b>Основные настройки</b>
                                    </button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="false"><b>Электронная визитка</b>
                                    </button>
                                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-contact" type="button" role="tab"
                                            aria-controls="nav-contact" aria-selected="false"><b>Уведомления</b>
                                    </button>
                                    <button class="nav-link" id="nav-noty-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-noty" type="button" role="tab"
                                            aria-controls="nav-noty" aria-selected="false"><b>Пароль</b>
                                    </button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                     aria-labelledby="nav-home-tab">
                                    <div class="row ">
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="attachmentscv" class="form-label">Фото профиля</label>
                                                <input class="form-control" type="file" name="image"
                                                       id="attachmentscv" accept="image/png, image/bmp, image/jpeg"/>
                                            </div>

                                            <!--end col-->
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">E-mail</label>
                                                <input type="email" class="form-control" name="email"
                                                       value="{{Auth::user()->email}}" autofocus/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Имя</label>
                                                <input type="text" class="form-control" name="name"
                                                       value="{{Auth::user()->name}}"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="tel" class="form-label">Телефон </label>
                                                <input type="tel" class="form-control" name="tel" id="phone_2"
                                                       value="{{Auth::user()->tel}}"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="tel2" class="form-label">Рабочий телефон </label>
                                                <input type="tel" class="form-control" name="tel2"  id="phone_22"
                                                       value="{{Auth::user()->tel2}}"/>
                                            </div>
                                        </div>

                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="city" class="form-label">Телефон для экстренной связи <i
                                                        class="uil uil-question-circle" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title=""
                                                        data-bs-original-title="В случае утери телефона и ухудшения самочувствия владельца."></i></label>
                                                <input type="text" class="form-control" name="tel_alert" id="phone_33"
                                                       value="{{Auth::user()->tel_alert}}"/>
                                            </div>


                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="city" class="form-label">Город</label>
                                                <input type="text" class="form-control" name="city"
                                                       value="{{Auth::user()->city}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                     aria-labelledby="nav-profile-tab">
                                    <figcaption class="figure-caption mb-3">
                                        Данные отображаются в электронной визитке
                                    </figcaption>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="instagram" class="form-label">Инстаграмм</label>
                                                <div class="input-group mb-3">
                                            <span class="input-group-text"
                                                  id="basic-addon3">https://instagramm.com/@</span>
                                                    <input type="text" class="form-control" name="instagram"
                                                           value="{{Auth::user()->instagram}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="vk" class="form-label">ВК</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">https://vk.com/</span>
                                                    <input type="text" class="form-control" name="vk"
                                                           value="{{Auth::user()->vk}}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="vk" class="form-label">Telegram</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">https://t.me/</span>
                                                    <input type="text" class="form-control" name="telegram"
                                                           value="{{Auth::user()->telegram}}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="vk" class="form-label">TikTok</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">https://www.tiktok.com/@</span>
                                                    <input type="text" class="form-control" name="tiktok"
                                                           value="{{Auth::user()->tiktok}}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="vk" class="form-label">YouTube</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="youtube"
                                                           value="{{Auth::user()->youtube}}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="vk" class="form-label">Одноклассники</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">https://ok.ru/</span>
                                                    <input type="text" class="form-control" name="odnoklassniki"
                                                           value="{{Auth::user()->odnoklassniki}}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="vk" class="form-label">Организация</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="organization"
                                                           value="{{Auth::user()->organization}}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="vk" class="form-label">День рождения</label>
                                                <div class="input-group mb-3">
                                                    <input type="date" class="form-control" name="birthday_at"
                                                           value="{{Auth::user()->birthday_at}}"/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                     aria-labelledby="nav-contact-tab">
                                    <div class="row">
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input class="form-check-input" type="checkbox" name="notify_email"
                                                       id="notify_email" {{ Auth::user()->notify_email  ? 'checked' : '' }}>
                                                <label class="form-check-label" for="notify_email">Уведомление на
                                                    e-mail</label>

                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input class="form-check-input" type="checkbox" name="notify_tel"
                                                       id="notify_tel" {{ Auth::user()->notify_tel ? 'checked' : '' }}>
                                                <label class="form-check-label" for="notify_tel">Звонок на
                                                    телефон</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input class="form-check-input" type="checkbox" name="notify_sms"
                                                       id="notify_sms" {{ Auth::user()->notify_sms ? 'checked' : '' }}>
                                                <label class="form-check-label" for="notify_sms">СМС на телефон</label>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input class="form-check-input" type="checkbox" name="notify_whatsup"
                                                       id="notify_whatsup" {{ Auth::user()->notify_whatsup ? 'checked' : '' }}>
                                                <label class="form-check-label" for="notify_whatsup">Сообщение в
                                                    WhatsUp</label>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input class="form-check-input" type="checkbox" name="notify_telegram"
                                                       id="notify_telegram" {{ Auth::user()->notify_telegram ? 'checked' : '' }}>
                                                <label class="form-check-label" for="notify_telegram">Сообщение в
                                                    Telegramm</label>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-noty" role="tabpanel"
                                     aria-labelledby="nav-noty-tab">
                                    <div class="row">


                                        @if(!Auth::user()->last_password )
                                            <div class="col-lg-12">
                                                <div class="mb-3">

                                                    <input class="form-check-input" type="checkbox" name="last_password"
                                                           id="last_password">
                                                    <label class="form-check-label" for="notify_tel">Оставить старый
                                                        пароль</label>
                                                    {{--
                                                    0 - пароль не меняли,
                                                    1 - поставили галку пароль оставить старый
                                                    2 - изменили пароль
                                                     --}}
                                                </div>
                                            </div>
                                        @endif




                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Новый пароль</label>
                                                <input type="password" class="form-control" name="password"
                                                       placeholder="Новый пароль" autocomplete="off"/>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Повторите пароль</label>
                                                <input type="password" class="form-control" name="password_confirmation"
                                                       placeholder="Повторите пароль" autocomplete="false"/>
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <!--end col-->
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-4 ">
                            <div class="col-6">
                                <button type="submit" class="btn btn-success">
                                    Сохранить
                                </button>
                            </div>
                            <div class="col-6 text-end">
                                @if(Auth::user()->email)
                                    <a href="{{route('board.edit')}}" class="btn btn-info btn-hover ">
                                         К объявлению
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>

                <!--end col-->
            </div>
            <!--end row--></div>
        <!--end container-->
    </section>
    <!-- END PROFILE -->

@endsection





{{-- vendor scripts --}}
@section('vendor-scripts')
    <!-- BEGIN: Page Vendor JS-->

    <!-- END: Page Vendor JS-->
@endsection

{{-- page scripts --}}
@section('page-scripts')

    <!-- Light Box Js -->
    <script src="/assets/libs/glightbox/js/glightbox.min.js"></script>

    <script src="/assets/js/pages/lightbox.init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js"
            type="text/javascript"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $("#phone_2").mask("+7(999)999-99-99");
            $("#phone_22").mask("+7(999)999-99-99");
            $("#phone_33").mask("+7(999)999-99-99");
        });
    </script>

@endsection

