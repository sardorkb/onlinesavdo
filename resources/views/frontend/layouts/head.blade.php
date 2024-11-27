<!-- Meta Tag -->
@yield('meta')

<!-- Title Tag  -->
<title>@yield('title')</title>
<!-- Favicon -->
<link rel="icon" type="image/png" href="images/favicon.png">
<!-- Web Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">


<!-- StyleSheet -->
<link rel="manifest" href="/manifest.json">
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/niceselect.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/flex-slider.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/owl-carousel.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset('back/css/custom.css')}}">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">

<!-- Eshop StyleSheet -->

<!-- ===============================================-->
<!--    Favicons-->
<!-- ===============================================-->
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('backend/img/favicon/apple-touch-icon.png')}}" />
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('backend/img/favicon/favicon-32x32.png')}}" />
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/img/favicon/favicon-16x16.png')}}" />
<link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/img/favicon/favicon.ico')}}" />
<link rel="manifest" href="{{asset('backend/img/favicon/manifest.json')}}" />
<meta name="msapplication-TileImage" content="{{asset('backend/img/favicon/mstile-150x150.png')}}" />
<meta name="theme-color" content="#ffffff" />
<script src="{{asset('back/vendors/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('back/vendors/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('back/js/config.js')}}"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- ===============================================-->
<!--    Stylesheets-->
<!-- ===============================================-->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
    rel="stylesheet" />
<link href="{{asset('back/vendors/simplebar/simplebar.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
<link href="{{asset('back/css/theme-rtl.min.css')}}" type="text/css" rel="stylesheet" id="style-rtl" />
<link href="{{asset('back/css/theme.min.css')}}" type="text/css" rel="stylesheet" id="style-default" />
<link href="{{asset('back/css/user-rtl.min.css')}}" type="text/css" rel="stylesheet" id="user-style-rtl" />
<link href="{{asset('back/css/user.min.css')}}" type="text/css" rel="stylesheet" id="user-style-default" />
<script>
    var phoenixIsRTL = window.config.config.phoenixIsRTL;
    if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
    } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
    }
</script>
<script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    document.addEventListener('keydown', event => {
        if (event.key === 'F12' || (event.ctrlKey && event.shiftKey && event.key === 'I')) {
            event.preventDefault();
        }
    });
</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<link href="{{asset('back/vendors/leaflet/leaflet.css')}}" rel="stylesheet" />
<link href="{{asset('back/vendors/leaflet.markercluster/MarkerCluster.css')}}" rel="stylesheet" />
<link href="{{asset('back/vendors/leaflet.markercluster/MarkerCluster.Default.css')}}" rel="stylesheet" />

<style>
    /* Multilevel dropdown */
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>a:after {
        content: "\f0da";
        float: right;
        border: none;
        font-family: 'FontAwesome';
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: 0px;
        margin-left: 0px;
    }

    /*
</style>
@stack('styles')