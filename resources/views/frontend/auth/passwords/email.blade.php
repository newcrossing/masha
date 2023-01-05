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
                                    <a href="index.html">
                                        <img src="/assets/images/logo-light.png" alt="" class="logo-light">
                                        <img src="/assets/images/logo-dark.png" alt="" class="logo-dark">
                                    </a>
                                    <div class="mt-5">
                                        <img src="assets/images/auth/reset-password.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div class="auth-content card-body p-5 h-100 text-white">
                                    <div class="text-center mb-4">
                                        <h5>Сброс пароля</h5>
                                        <p class="text-white-50">Сброс вашего пароля на сервисе Маша-растеряша.рф</p>
                                    </div>

                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <form class="auth-form text-white" method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="alert alert-warning text-center mb-4" role="alert"> Введите свой email и мы отправим инструкциыю.</div>
                                        <div class="mb-4">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" class="form-control" id="email"
                                                   placeholder="Введите Email " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action=" ">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
