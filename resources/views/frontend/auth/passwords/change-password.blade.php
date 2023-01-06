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
                                        <img src="/assets/images/logo.png" alt="" class="">
                                    </a>
                                    <div class="">
                                        <img src="/assets/images/auth/reset-password.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div class="auth-content card-body p-5 h-100 text-white">
                                    <div class="text-center mb-4">
                                        <h5>Новый пароль</h5>
                                        <p class="text-white-50">Минимальная длинна пароля 6 символов. Пароли должны совпадать.</p>
                                    </div>

                                    @if (Session::has("success"))
                                        {{ Session::get('success') }}
                                    @elseif (Session::has("failed"))
                                        <div class="alert alert-danger text-center mb-4" role="alert">
                                            {{ Session::get('failed') }}
                                        </div>

                                    @endif

                                    <form class="auth-form text-white" method="POST" action="{{ route('reset-password') }}" style="width: 100%">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="email" value="{{ $email }} "/>

                                        <div class="mb-4">
                                            <label class="form-label" for="email">Новый пароль</label>
                                            @error('password')
                                            <div><span class="badge bg-danger">{{ $message }}</span></div>
                                            @enderror
                                            <input type="password" class="form-control"
                                                   placeholder="Введите новый пароль"
                                                   name="password" value="" required autofocus>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label" for="email">Повторите пароль</label>
                                            @error('confirm_password')
                                            <div><span class="badge bg-danger">{{ $message }}</span></div>
                                            @enderror
                                            <input type="password" class="form-control"
                                                   placeholder="Повторите новый пароль" name="confirm_password"
                                                   value="" required>
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-white w-100">Сохранить </button>
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
