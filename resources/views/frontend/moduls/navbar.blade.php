<nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
    <div class="container-fluid custom-container">
        <a class="navbar-brand text-dark fw-bold me-auto" href="{{route('home')}}">
            <img src="/assets/images/logo.png" height="60" alt="" class="logo-dark"/>
        </a>
        <div>
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mx-auto navbar-center">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link" style="margin-top: 1px">Главная</a>
                </li>

                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link" href="javascript:void(0)" id="productdropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Помощь
                        <div class="arrow-down"></div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-center" aria-labelledby="productdropdown">
                        <li><a class="dropdown-item" href="{{route('agreement')}}">Публичная оферта</a></li>
                        <li><a class="dropdown-item" href="{{route('privacy-policy')}}">Безопасность</a></li>
                        <li><a class="dropdown-item" href="{{route('help')}}">Служба поддержки</a></li>

                    </ul>
                </li><!--end dropdown-->
            </ul><!--end navbar-nav-->
        </div>
        <!--end navabar-collapse-->
        <ul class="header-menu list-inline d-flex align-items-center mb-0">
            @auth
                <li class="list-inline-item dropdown">
                    <a href="javascript:void(0)" class="header-item" id="userdropdown" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <img src="{{ Storage::url('/avatars/300/'.Auth::user()->getFoto()) }}" width="35" height="35"
                             class="rounded-circle me-1">
                        <span class="d-none d-md-inline-block fw-medium">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown">
                        <li><a class="dropdown-item" href="{{route('board.edit')}}">Моё объявлениe</a></li>
                        <li><a class="dropdown-item" href="{{route('profile.settings')}}">Настройки</a></li>
                        @role('admin')
                        <li><a class="dropdown-item" href="{{route('admin.home')}}" target="_blank">Перейти в
                                админку</a></li>
                        @endrole
                        <li><a class="dropdown-item" href="{{route('logout')}}">Выйти</a></li>
                    </ul>
                </li>
            @endauth
            @guest
                <li class="list-inline-item dropdown">
                    <a href="{{route('login')}}" class="header-item"
                       aria-expanded="false">
                        <span class="d-md-inline-block fw-medium">Войти</span>
                    </a>
                </li>
            @endguest
        </ul><!--end header-menu-->
    </div>
    <!--end container-->
</nav>
