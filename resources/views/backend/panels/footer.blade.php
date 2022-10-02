<footer class="footer footer-light @if(!empty(config('admin.footerType'))){{config('admin.footerClass')}}@endif">
  <p class="clearfix mb-0">
    <span class="float-left d-inline-block">2020 &copy; PIXINVENT</span>
    <span class="float-right d-sm-inline-block d-none">Crafted with
      <i class="bx bxs-heart pink mx-50 font-small-3"></i>by
      <a class="text-uppercase" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a>
    </span>
    @if(config('admin.isScrollTop') === true)
    <button class="btn btn-primary btn-icon scroll-top" type="button">
      <i class="bx bx-up-arrow-alt"></i>
    </button>
    @endif
  </p>
</footer>
