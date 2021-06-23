
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Library</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://linkedin.com/in/honorezemagho">Honorezemagho</a>
      </div>
    </div>
  </footer>
  <!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('frontend/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{ asset('frontend/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('frontend/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{ asset('frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('frontend/vendor/superfish/superfish.min.js')}}"></script>
  <script src="{{ asset('frontend/vendor/hoverIntent/hoverIntent.js')}}"></script>
  <script src="{{ asset('frontend/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('frontend/js/main.js')}}"></script>
  <script>
    jQuery(document).ready(function($) {
        		"use strict";
        		//  TESTIMONIALS CAROUSEL HOOK
		        $('#customers-testimonials').owlCarousel({
		            loop: true,
		            center: true,
		            items: 3,
		            margin: 0,
		            autoplay: true,
		            dots:true,
		            autoplayTimeout: 8500,
		            smartSpeed: 450,
		            responsive: {
		              0: {
		                items: 1
		              },
		              768: {
		                items: 2
		              },
		              1170: {
		                items: 3
		              }
		            }
		        });
        	});
  </script>

</body>

</html>
