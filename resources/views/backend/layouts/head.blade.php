<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Custom fonts for this template-->

    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
    @stack('styles')
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
    <link href="{{asset('back/vendors/leaflet/leaflet.css')}}" rel="stylesheet" />
    <link href="{{asset('back/vendors/leaflet.markercluster/MarkerCluster.css')}}" rel="stylesheet" />
    <link href="{{asset('back/vendors/leaflet.markercluster/MarkerCluster.Default.css')}}" rel="stylesheet" />
</head>
