<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#625AFA">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags -->
    <!-- Title -->
    <title>Suha - Multipurpose Ecommerce Mobile HTML Template</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('suha')}}/img/icons/icon-72x72.png">
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="{{asset('suha')}}/img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('suha')}}/img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="{{asset('suha')}}/img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('suha')}}/img/icons/icon-180x180.png">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('suha')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('suha')}}/css/tabler-icons.min.css">
    <link rel="stylesheet" href="{{asset('suha')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('suha')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('suha')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('suha')}}/css/nice-select.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('suha')}}/style.css">
    <!-- Web App Manifest -->
    <link rel="manifest" href="{{asset('suha')}}/manifest.json">
  </head>
  <body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only"></div>
      </div>
    </div>
    <!-- Header Area -->
    
	@include('template._header')
	@include('template._sidebar')
    <!-- PWA Install Alert -->
    <div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
      <div class="toast-body">
        <div class="content d-flex align-items-center mb-2"><img src="{{asset('suha')}}/img/icons/icon-72x72.png" alt="">
          <h6 class="mb-0">Add to Home Screen</h6>
          <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
        </div><span class="mb-0 d-block">Click the<strong class="mx-1">Add to Home Screen</strong>button &amp; enjoy it like a regular app.</span>
      </div>
    </div>

    @yield('content')

    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    @include('template._footer')
    <!-- All JavaScript Files-->
    <script src="{{asset('suha')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('suha')}}/js/jquery.min.js"></script>
    <script src="{{asset('suha')}}/js/waypoints.min.js"></script>
    <script src="{{asset('suha')}}/js/jquery.easing.min.js"></script>
    <script src="{{asset('suha')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('suha')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('suha')}}/js/jquery.counterup.min.js"></script>
    <script src="{{asset('suha')}}/js/jquery.countdown.min.js"></script>
    <script src="{{asset('suha')}}/js/jquery.passwordstrength.js"></script>
    <script src="{{asset('suha')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('suha')}}/js/theme-switching.js"></script>
    <script src="{{asset('suha')}}/js/no-internet.js"></script>
    <script src="{{asset('suha')}}/js/active.js"></script>
    <script src="{{asset('suha')}}/js/pwa.js"></script>
  </body>
</html>