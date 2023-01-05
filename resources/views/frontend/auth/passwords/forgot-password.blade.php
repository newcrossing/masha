@extends('frontend.layouts.auth')
@section('title','Авторизация')

@section('content')
    <!-- START RESET-PASSWORD -->
    <section class="bg-auth">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12">
                    <div class="card auth-box">
                        <div class="row g-0">
                            <div class="col-lg-6 text-center">
                                <div class="card-body p-4">
                                    <a href="/">
                                        <img src="/assets/images/logo.png" alt="" class="">
                                    </a>
                                    <div class="">
                                        <img src="assets/images/auth/reset-password.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div class="auth-content card-body p-5 h-100 text-white">
                                    <div class="text-center mb-4">
                                        <h5>Сброс пароля</h5>
                                        <p class="text-white-50">Введите свой e-mail и мы отправим инструкцию по сбросу пароля.</p>
                                    </div>

                                    @if (Session::has("success"))
                                        <div class="alert alert-success text-center mb-4" role="alert">{{ Session::get('success') }}</div>
                                    @elseif (Session::has("failed"))
                                        <div class="alert alert-danger text-center mb-4 w-100" role="alert"> {{ Session::get('failed') }}</div>
                                    @endif


                                    <form class="auth-form " method="POST" action="{{ route('forgot-password') }}" style="width: 100%">
                                        @csrf


                                        <div class="mb-4">
                                            <label class="form-label" for="email">E-mail</label>
                                            <input type="email" class="form-control" id="email"
                                                   placeholder="Введите Email " name="email"
                                                   value="{{ old('email') }}" required autofocus>
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-white w-100">Сбросить</button>
                                        </div>
                                    </form><!-- end form -->

                                    <div class="mt-5 text-center text-white-50">
                                        <p>Вспомнили?
                                            <a href="{{route('login')}}" class="fw-medium text-white text-decoration-underline"> Войти </a>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end auth-box-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- END RESET-PASSWORD -->

@endsection
