<div class="lowerpart">
    <footer class="dsplay">
      <div class="container bdinpad">
        <img src="{{ asset('assets/keto_assets/images/logo.png') }}" alt="" class="ftrlogo">
        <p class="ftrtxt2 dicclmr">*The product is not approved by the FDA. This product is not intended to diagnose, treat, cure, or prevent any disease. Photographs are for dramatization purposes only and may include models. Results may vary based on time and degree of product usage.</p>
        <div class="crop-info">
          <p class="crop-infohding">Connect With Us</p>
          <p class="crop-infotxt">Glengarry Technology Inc</p>
          <p class="crop-infotxt">676 E 100 N, American Fork, UT 84003-2112</p>
          <p class="crop-infotxt">(877)202-5676</p>
          <p class="crop-infotxt">
            <a href="mailto:care@goldlabsolutions.com">care@goldlabsolutions.com</a>
          </p>
        </div>
        <div class="ftrdvdr"></div>
        <p class="ftrtxt1">
          <a href="{{ route('terms') }}" target="_blank">Terms &amp; Conditions</a> | <a href="{{ route('privacy') }}" target="_blank">Privacy Policy</a> | <a href="{{ route('ingredients') }}" target="_blank">Ingredients</a> | <a href="{{ route('contact-us') }}">Contact</a>
        </p>
        <p class="ftrtxt2">© <script type="text/javascript">
            var year = new Date();
            document.write(year.getFullYear());
          </script> Gold Lab Solutions. All rights reserved. </p>
      </div>
    </footer>
    <div class="clearall"></div>
  </div>
  <script src="{{ asset('assets/keto_assets/js/jquery-3.6.0.min.js.download') }}"></script>
  <script src="{{ asset('assets/keto_assets/js/slick.js.download') }}"></script>
  <script src="{{ asset('assets/keto_assets/js/bookmarkscroll.js.download') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/keto_assets/js/jquery.cookie.js.download') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/keto_assets/js/jquery.h5validate.js.download') }}"></script>
  {{-- <script type="text/javascript" src="{{ asset('assets/keto_assets/js/cartv5.js.php') }}"></script> --}}
  <script type="text/javascript" src="{{ asset('assets/keto_assets/js/jquery.maskedinput.min.js.download') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/keto_assets/js/jquery.fancybox.js.download') }}"></script>
  <script src="{{ asset('assets/keto_assets/js/bookmarkscroll.js.download') }}"></script>
  <script src="{{ asset('assets/keto_assets/js/common.js.download') }}"></script>
  <script src="{{ asset('assets/keto_assets/js/wan-spinner.js.download') }}"></script>
  <script src="{{ asset('assets/plugins/loading-overlay/loadingoverlay.min.js') }}"></script>
  <script src="{{ asset('assets/developer_js/process_cart.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function() {});
  </script>
  {{-- <script type="text/javascript">
    $(document).ready(function(e) {
      $(".add-to-cart-sing").click(function(e) {
        e.preventDefault();
        var pid = $(this).attr('id'); //alert(pid);
        addItem(pid, 1);
      });
    });
  </script> --}}
  <script type="text/javascript">
    $(document).ready(function() {
      //FANCYBOX OPEN
      $('.fancybox').fancybox();
      //FANCYBOX CLOSE
      $('.close').click(function() {
        $('#popover').fadeOut();
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.menu-bar li a').click(function() {
        $('li a').removeClass("active");
        $(this).addClass("active");
      });
      $('.mob-mnu-ic').click(function(e) {
        $('.mobimenu').slideToggle();
        $('.mob-mnu-ic span').toggle();
        $('.dl-trigger').toggleClass('dl-active');
      });
      // $('.add-to-cart-sing, .cart_btn_mob').click(function(e) {
      //   $('.cart-is').toggleClass('cart_open');
      //   showCart(true);
      // });
      $('.cart-close').click(function(e) {
        $('.cart-is').removeClass('cart_open');
      });
      $(".cart-remv").click(function(e) {
        var btn = $(this);
        $(this).parent().parent().parent().fadeOut('slow', function() {})
      });
      /*--------------------------*/
    });
    $(document).scroll(function() {
      if ($(this).scrollTop() > 110) {
        $('.menu-sec').addClass('fixed-nav');
      } else {
        $('.menu-sec').removeClass('fixed-nav');
      }
      if ($(this).scrollTop() > 10) {
        $('.mobimenu').addClass('mobimenu-top');
      } else {
        $('.mobimenu').removeClass('mobimenu-top');
      }
    });
  </script>
</body>
</html>
