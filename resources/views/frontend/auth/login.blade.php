@extends('frontend.layouts.auth')
@section('title','Авторизация')
@section('content')
    <!-- START SIGN-IN -->
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
                                    <div class="mt-5">
                                        <img src="/assets/images/auth/sign-in.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div class="auth-content card-body p-5 h-100 text-white">
                                    <div class="w-100">
                                        <div class="text-center mb-4">
                                            <h5>Добро пожаловать !</h5>
                                            <p class="text-white-70">В сервис Маша-растеряша.</p>
                                        </div>
                                        @if (Session::has("success"))
                                            <div class="alert alert-success text-center mb-4" role="alert">{{ Session::get('success') }}</div>
                                        @endif


                                        <form action="{{ route('login') }}" method="POST" class="auth-form">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="usernameInput" class="form-label">Логин</label>
                                                @error('email')
                                                <div><span class="badge bg-danger">{{ $message }}</span></div>
                                                @enderror
                                                <input type="text" name="login" value="{{ old('login') }}"
                                                       class="form-control" id="usernameInput"
                                                       placeholder="Введите ваш логин" required autofocus>
                                            </div>
                                            <div class="mb-3">
                                                <label for="passwordInput" class="form-label">Пароль</label>

                                                <input type="password" name="password" class="form-control"
                                                       id="passwordInput"
                                                       placeholder="Введите ваш пароль" required>
                                            </div>

                                            <div class="mb-4">
                                                <div class="form-check">
                                                    <a href="{{route('forgot-password')}}" class="float-end text-white">Забыли пароль?</a>
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="privacy_policy" name="privacy_policy" required>
                                                    <label class="form-check-label" for="privacy_policy">Согласен с
                                                        <a href="{{route('privacy-policy')}}" target="_blank" style="color: #f7ffef; text-decoration: #fffdfe solid underline">
                                                            политикой конфиденциальности
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="agreement" name="agreement" required>
                                                    <label class="form-check-label" for="agreement">Согласен с
                                                        <a href="{{route('agreement')}}" target="_blank"
                                                           style="color: #f7ffef; text-decoration: #fffdfe  solid underline">
                                                            пользовательским соглашением
                                                        </a>
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-white btn-hover w-100">Войти
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end auth-box-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- END SIGN-IN -->
@endsection


