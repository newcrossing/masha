@extends('frontend.layouts.index')

@section('title',$board->name)

@section('vendor-styles')
@endsection

@section('page-styles')
    <link rel="stylesheet" href="/assets/libs/glightbox/css/glightbox.min.css">
@endsection

@section('content')
    <!-- Start home  уменьшить title-->
    <section class="page-title-box" style="padding-top: 150px; padding-bottom: 85px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h3 class="mb-4">{{$board->name}}</h3>
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


    <!-- START JOB-DEATILS -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <!--start side-bar-->
                    <div class="side-bar ms-lg-4">
                        <div class="card job-overview">
                            <div class="card-body p-4">

                                <div class="mt-3">
                                    <h4 class="fs-22 " style="text-align: center">Связаться с хозяином</h4>
                                    <br>
                                    @if(isset($board->user->tel) && $board->user->notify_tel)
                                        <a href="tel:{{$board->user->tel}}" class="btn btn-primary btn-hover w-100 mt-2">
                                            <i class="uil uil-phone"></i> Позвонить
                                        </a>
                                    @endif

                                    @if(isset($board->user->tel2) && $board->user->notify_tel)
                                        <a href="tel:{{$board->user->tel2}}" class="btn btn-primary btn-hover w-100 mt-2">
                                            <i class="uil uil-phone"></i> Позвонить на рабочий номер
                                        </a>
                                    @endif

                                    @if(isset($board->user->tel) && $board->user->notify_sms)
                                        <a href="sms:{{$board->user->tel}}?body=Здравствуйте, я нашел вашу вещь" class="btn btn-primary btn-hover w-100 mt-2">
                                            <i class="uil  uil-comment-alt-lines"></i> Написать СМС
                                        </a>
                                    @endif



                                    @if(isset($board->user->email) && $board->user->notify_email)
                                        <a href="#applyNow" data-bs-toggle="modal" class="btn btn-primary btn-hover w-100 mt-2">
                                            <i class="uil uil-envelope"></i> Написать автору
                                        </a>
                                    @endif

                                    @if(isset($board->user->tel) && $board->user->notify_whatsup)
                                        <a href="#" id="clickwhatsup" class="btn btn-primary btn-hover w-100 mt-2">
                                            <i class="uil uil-whatsapp"></i> Написать в WhatsUp
                                        </a>
                                    @endif



                                    @if(isset($board->user->tel) && $board->user->notify_telegram)
                                        <a href="https://t.me/{{$board->user->tel}}" class="btn btn-primary btn-hover w-100 mt-2">
                                            <i class="uil uil-telegram"></i> Написать в Telegram
                                        </a>
                                    @endif

                                    @auth()
                                        @if($board->user_id== Auth::user()->id )
                                            <a href="{{route('board.edit',$board->id)}}" class="btn btn-success btn-hover w-100 mt-4">
                                                <i class="uil uil-file-edit-alt"></i> Редактировать
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            </div><!--end card-body-->
                        </div><!--end job-overview-->


                    </div>
                    <!--end side-bar-->
                </div><!--end col-->
                <div class="col-lg-8">
                    <div class="card job-detail overflow-hidden">
                        <div class="col-lg-12">
                            <div class="candidate-portfolio mb-5">
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <div class="swiper testimonialSlider pb-5">
                                            <div class="swiper-wrapper">
                                                @foreach($board->fotos as $foto)
                                                    <div class="swiper-slide">
                                                        <img src="{{ Storage::url('/boards/1400/'.$foto->file) }}"
                                                             class="img-fluid rounded-3" height="300">
                                                    </div><!--end swiper-slide-->
                                                @endforeach
                                                @if(!count($board->fotos))
                                                    <div class="swiper-slide">
                                                        <img src="{{ Storage::url('/boards/1400/000.jpg') }}"
                                                            class="img-fluid rounded-3" height="300">
                                                    </div><!--end swiper-slide-->
                                                @endif
                                            </div>
                                            <!--end swiper-wrapper-->
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div><!-- end row -->
                            </div><!-- end portfolio -->

                        </div><!-- end col -->
                        <div class="card-body p-4">
                            @if($board->text)
                                <div class="mt-4">
                                    <h5 class="mb-3">Описание</h5>
                                    <div class="job-detail-desc">
                                        <p class="text-muted mb-0">{{$board->text}}</p>
                                    </div>
                                </div>
                            @endif
                            @isset($board->money)
                                <div class="mt-4">
                                    <h6 class="mb-3">Вознаграждение</h6>
                                    <div class="job-detail-desc">
                                        <p class="text-muted mb-0">{{$board->money}} руб.</p>
                                    </div>
                                </div>
                            @endisset


                        </div><!--end card-body-->
                    </div><!--end job-detail-->


                </div><!--end col-->


            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- START JOB-DEATILS -->

    <!-- START APPLY MODAL -->
    <div class="modal fade" id="applyNow" tabindex="-1" aria-labelledby="applyNow" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <div class="alert  bg-soft-success" id="messagesentok2" role="alert" style="display: none">
                        Сообщение отправлено
                    </div>


                    <form id="emailform">
                        @csrf
                        <input type="hidden" name="id" id="idControlInput" value="{{$board->user_id}}">
                        <div class="text-center mb-4">
                            <h5 class="modal-title" id="staticBackdropLabel">Сообщение автору на email</h5>
                        </div>
                        <div class="position-absolute end-0 top-0 p-3">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="mb-3">
                            <label for="nameControlInput" class="form-label">Ваше имя</label>
                            <input type="text" class="form-control" id="nameControlInput" placeholder="Введите ваше имя"
                                   required>
                            <span class="badge bg-soft-danger name_err "></span>
                        </div>
                        <div class="mb-3">
                            <label for="emailControlInput" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailControlInput"
                                   placeholder="Введите ваше email" required>
                            <span class="badge bg-soft-danger email_err "></span>
                        </div>
                        <div class="mb-3">
                            <label for="messageControlTextarea" class="form-label">Сообщение</label>
                            <textarea
                                class="form-control" id="messageControlTextarea" rows="4"
                                placeholder="Напишите как можно с вами связаться" required></textarea>
                            <span class="badge bg-soft-danger text_err "></span>
                        </div>

                        <button type="submit" class="btn btn-primary w-100" id="submitmail">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- END APPLY MODAL -->

@endsection

@section('vendor-scripts')
@endsection

@section('page-scripts')

    <!-- Light Box Js -->
    <script src="/assets/libs/glightbox/js/glightbox.min.js"></script>

    <script src="/assets/js/pages/lightbox.init.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#submitmail").click(function (e) {
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var email = $("#emailControlInput").val();
                var id = $("#idControlInput").val();
                var name = $("#nameControlInput").val();
                var text = $("#messageControlTextarea").val();

                $.ajax({
                    url: "{{ route('board.send') }}",
                    type: 'POST',
                    data: {_token: _token, email: email, name: name, text: text, id: id},
                    success: function (data) {
                        console.log(data.error)
                        if ($.isEmptyObject(data.error)) {
                            // alert(data.success);
                            $('#messagesentok2').show();
                            $('#emailform').hide();
                        } else {
                            printErrorMsg(data.error);
                        }
                    }
                });
            });

            function printErrorMsg(msg) {
                $.each(msg, function (key, value) {
                    //console.log(key);
                    $('.' + key + '_err').text(value);
                });
            }


            const form = document.querySelector('.form');
            const number = '7911352392';

            function sendToWhatsapp(text, phone) {

                text = encodeURIComponent(text);

                let url = `https://web.whatsapp.com/send?phone=${phone}&text=${text}&source=&data=`;

                window.open(url);
            }

            $("#clickwhatsup").click(function (e) {

                var tel = "{{  $board->user->tel }}";
                var text = encodeURIComponent("Я нашел вашу вещь как вам ее вернуть?");
                e.preventDefault();

                let url = `https://api.whatsapp.com/send/?phone=${tel}&text=${text}`;
                window.open(url);
            });

            $("#clickwhatsup2").click(function (e) {

                var tel = "{{  $board->user->tel2 }}";
                var text = encodeURIComponent("Я нашел вашу вещь как вам ее вернуть?");
                e.preventDefault();

                let url = `https://api.whatsapp.com/send/?phone=${tel}&text=${text}`;
                window.open(url);
            });
        });
    </script>
@endsection

