<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/node-waves/node-waves.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/hammer/hammer.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/typeahead-js/typeahead.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('assets/js/main.js')) }}"></script>
<script>
  var swiper = new Swiper('#swiper-infografis', {
      loop: true, // Aktifkan mode infinity
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
  });
  var swiperBig = new Swiper('#swiper-big-article', {
      loop: true, // Aktifkan mode infinity
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
  });
</script>
<script>
  // Initialize the thumbs swiper
  var thumbsSwiper = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      loop: true, // Aktifkan mode infinity
  });

  // Link the top swiper with the thumbs swiper
  topSwiper.controller.control = thumbsSwiper;
  thumbsSwiper.controller.control = topSwiper;
</script>
<script>
  $(document).ready(function() {
      // Temukan semua elemen dengan class .isOpenUrl
      var isOpenUrlElements = $('.isOpenUrl');

      // Atur kursor mouse seperti tautan
      isOpenUrlElements.css('cursor', 'pointer');

      // Tambahkan event click ke elemen
      isOpenUrlElements.click(function() {
          // Dapatkan nilai atribut link dari elemen
          var link = $(this).attr('link');

          // Buka URL dalam tab baru
          window.open(link, '_blank');
      });
  });
  </script>
<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
