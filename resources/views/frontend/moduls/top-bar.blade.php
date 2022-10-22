<!-- START TOP-BAR -->
<div class="top-bar">
    <div class="container-fluid custom-container">
        <div class="row g-0 align-items-center">
            <div class="col-md-7">
                <ul class="list-inline mb-0 text-center text-md-start">

                    <li class="list-inline-item">
                        <ul class="topbar-social-menu list-inline mb-0">
                            @foreach ($socials as $social)
                                <li class="list-inline-item">
                                    <a href="{{$social->link}}" class="social-link">
                                        <i class="{{$social->ico}}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <!--end col-->
            <div class="col-md-5">
                <ul class="list-inline mb-0 text-center text-md-end">
                    {{---<li class="list-inline-item py-2 me-2 align-middle">
                        <a href="#signupModal" class="text-dark fw-medium fs-13" data-bs-toggle="modal"><i
                                    class="uil uil-lock"></i>
                            Войти</a>
                    </li>---}}
                    <li class="list-inline-item align-middle">
                        <div class="dropdown d-inline-block language-switch">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <img id="header-lang-img" src="/assets/images/flags/russia.jpg" alt="Header Language"
                                     height="16"/>
                            </button>

                        </div>
                    </li>
                </ul>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</div>
<!-- END TOP-BAR -->

