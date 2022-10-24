<section class="bg-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="footer-item mt-4 mt-lg-0 me-lg-5">
                    <h4 class="text-white mb-4">Маша-растеряша</h4>
                    <p class="text-white-50">Поиск пропавших вещей</p>
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
