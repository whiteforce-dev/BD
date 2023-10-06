<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Ventic : Ticketing Admin Template" />
	<meta property="og:title" content="Ventic : Ticketing Admin Template" />
	<meta property="og:description" content="Ventic : Ticketing Admin Template" />
	<meta property="og:image" content="social-image.png" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
    <title>White-Force</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('whiteforce_logo1.png') }}">
    @include('Master.Header')
    <!-- Favicon icon -->
</head>
   <body style="background-color: #EDF2F9 !important;">
        <!--*******************
            Preloader start
        ********************-->
        <div id="preloader">
            <div class="loader">
                <div class="loader--dot"></div>
                <div class="loader--dot"></div>
                <div class="loader--dot"></div>
                <div class="loader--dot"></div>
                <div class="loader--dot"></div>
                <div class="loader--dot"></div>
                <div class="loader--text"></div>
            </div>
        </div>
        <!--*******************
            Preloader end
        ********************-->

        <!--**********************************
            Main wrapper start
        ***********************************-->
        <div id="main-wrapper" class="show menu-toggle">
            <!--**********************************
                Nav header start
            ***********************************-->
            <div class="nav-header">
                <a href="index.html" class="brand-logo">
                    <!--

                    <div class="brand-title">Ventic</div> -->
                        <img class="logo-abbr" src="{{ url('new_logo_wf.png') }}" alt="" style="max-width: 42px;min-width: 86px;">
                        <rect class="svg-logo-rect" width="54" height="54" rx="14" fill="#0E8A74"/>
                        <path class="svg-logo-path" d="M13 17H24.016L31.802 34.544L38.33 17H40.948L31.972 40.8H23.54L13 17Z" fill="white"/>

                </a>
                {{--  <div class="nav-control">
                    <div class="hamburger is-active">
                        <span class="line"></span><span class="line"></span><span class="line"></span>
                    </div>
                </div>  --}}

            </div>
            <!--**********************************
                Nav header end
            ***********************************-->
            @include('Master.Navbar')
            @include('Master.Sidebar')

            <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

            @yield('css')
            @yield('content')
        </div>
        @include('Master.Footer')
    </body>

    </html>

