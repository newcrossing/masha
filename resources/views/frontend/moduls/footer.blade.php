<section class="bg-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-item mt-4 mt-lg-0 me-lg-5">
                    <h4 class="text-white mb-4">Маша-растеряша</h4>
                    <p class="text-white-50">Поиск пропавших вещей</p>
                </div>
            </div><!--end col-->
            <div class="col-lg-4">
                <div class="footer-item mt-4 mt-lg-0 me-lg-5">
                    <p class="fs-16 text-white mb-4">Контакты</p>
                    <p class="text-white-50">support@masha-rasteryasha.online</p>
                </div>
            </div><!--end col-->
            <div class="col-lg-4 col-6">
                <div class="footer-item mt-4 mt-lg-0">
                    <p class="fs-16 text-white mb-4">Точки продаж</p>
                    <ul class="list-unstyled footer-list mb-0">
                        @foreach (\App\Models\Point::whereActive(1)->get() as $point)
                            <li>
                                <a href="{{$point->link}}"><i class="mdi mdi-chevron-right"></i> {{$point->address}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>

<!-- START FOOTER-ALT -->
<div class="footer-alt">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <a href="{{route('agreement')}}" class="text-white-50 mb-0">
                  Пользовательское соглашение
                </a>
            </div><!--end col-->
            <div class="col-lg-3">
                <a href="{{route('privacy-policy')}}" class="text-white-50 mb-0">
                    Политика конфиденциальности
                </a>
            </div><!--end col-->
            <div class="col-lg-3">
                <a href="{{route('public-offer')}}" class="text-white-50 mb-0">
                    Пуьличная оферта
                </a>
            </div><!--end col-->
            <div class="col-lg-3">
                <p class="text-white-50 text-center mb-0">
                    <script>document.write(new Date().getFullYear())</script> &copy; Маша-растеряша
                </p>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</div>
<!-- END FOOTER -->
