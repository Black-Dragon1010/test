<!DOCTYPE html>
<!--[if IE 8]>    <html class="ie8" lang="en-US"> <![endif]-->
<!--[if IE 9]>    <html class="ie9" lang="en-US"> <![endif]-->
<!--[if (gt IE 9)|!(IE)] lang="en-US"><![endif]-->
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- feeds & pingback -->
    <link rel="stylesheet" media="print" onload="this.onload=null;this.media='all';" id="ao_optimized_gfonts" href="https://fonts.googleapis.com/css?family=Poppins%3A700%2Cnormal&amp;display=swap" />
    
    <!-- <link href="https://remag.wpsoul.net/wp-content/cache/autoptimize/css/autoptimize_da9571a1a55b4f3a778e2f7d329968c7.css" rel="stylesheet" /> -->
    <link media="all" href="{{ asset('theme/css/autoptimize.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Enyxa')</title>
    <link rel="shortcut icon" type="image/ico" href="{{ asset('uploads/logo/favicon.ico') }}"/>
    <link href='https://fonts.gstatic.com' crossorigin='anonymous' rel='preconnect' />

    <link media="all" href="{{ asset('theme/wp-content/aut_single4113.css') }}" rel="stylesheet" />
    <link media="all" href="{{ asset('theme/wp-content/aut_single3777.css') }}" rel="stylesheet" />
    <link rel="stylesheet" id="dashicons-css" href="{{ asset('theme/wp-content/dashicons.min.css')}}" type="text/css" media="all">
    <link media="all" href="{{ asset('theme/css/style.css') }}" rel="stylesheet" />

    <script type='text/javascript' src="{{ asset('theme/wp-content/jquery.min.js') }}" id='jquery-core-js'></script>

    <script type='text/javascript' id='bp-confirm-js-extra'>
        /* <![CDATA[ */
        var BP_Confirm = {
            "are_you_sure": "Are you sure?"
        };
        /* ]]> */
    </script>

    <!-- <link rel="preload" href="{{ asset('theme/wp-content/rhicons.woff2') }}" as="font" type="font/woff2" crossorigin="crossorigin"> -->
    <link href="{{ asset('theme/css/wp_home.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme/css/home_scope.css') }}" rel="stylesheet" />
    <!-- global custom style -->
    @yield('page-styles')
    
</head>

<body class="home-page bp-legacy home page-template-default page page-id-3777 noinnerpadding elementor-default elementor-kit-4113 elementor-page elementor-page-3777 no-js">

    <!-- Outer Start -->
    <div class="rh-outer-wrap">
        <div id="top_ankor"></div>
        @include('layouts.partial.header')

        @yield('content')

        @include('layouts.partial.footer')
    </div><!-- Outer End -->
    <span class="rehub_scroll" id="topcontrol" data-scrollto="#top_ankor"><i class="rhicon rhi-chevron-up"></i></span>
    <div id="logo_mobile_wrapper"><a href="https://remag.wpsoul.net" class="logo_image_mobile"><img src="https://remag.wpsoul.net/wp-content/uploads/2020/02/remagmlogo.png" alt="Rehub Magazine demo" width="160" height="50" /></a></div>



    <div id="rhmobpnlcustom" class="rhhidden">
        <div id="rhmobtoppnl" style="background-color: #f3f3f3;" class="pr15 pl15 pb15 pt15">
            <div class="text-center"><a href="https://remag.wpsoul.net"><img id="mobpanelimg" src="https://remag.wpsoul.net/wp-content/uploads/2020/02/remaglogos.png" alt="Logo" width="150" height="45" /></a></div>
        </div>
    </div>

    <script type='text/javascript' id='rehub-js-extra'>
        /* <![CDATA[ */
        var rhscriptvars = {
            "back": "back",
            "ajax_url": "\/wp-admin\/admin-ajax.php",
            "fin": "That's all",
            "noresults": "No results found",
            "your_rating": "Your Rating:",
            "nonce": "938ca1bd3c",
            "hotnonce": "76ce97315d",
            "wishnonce": "cb262da894",
            "searchnonce": "20642a46fd",
            "filternonce": "9bfbe2a03c",
            "rating_tabs_id": "8b8ec5ff5a",
            "max_temp": "10",
            "min_temp": "-10",
            "helpnotnonce": "bfd746fcf6"
        };
        /* ]]> */
    </script>

    <script type='text/javascript' id='elementor-frontend-js-before'>
        var elementorFrontendConfig = {
            "environmentMode": {
                "edit": false,
                "wpPreview": false,
                "isScriptDebug": false,
                "isImprovedAssetsLoading": false
            },
            "i18n": {
                "shareOnFacebook": "Share on Facebook",
                "shareOnTwitter": "Share on Twitter",
                "pinIt": "Pin it",
                "download": "Download",
                "downloadImage": "Download image",
                "fullscreen": "Fullscreen",
                "zoom": "Zoom",
                "share": "Share",
                "playVideo": "Play Video",
                "previous": "Previous",
                "next": "Next",
                "close": "Close"
            },
            "is_rtl": false,
            "breakpoints": {
                "xs": 0,
                "sm": 480,
                "md": 768,
                "lg": 1025,
                "xl": 1440,
                "xxl": 1600
            },
            "version": "3.1.1",
            "is_static": false,
            "experimentalFeatures": [],
            "urls": {
                "assets": "https:\/\/remag.wpsoul.net\/wp-content\/plugins\/elementor\/assets\/"
            },
            "settings": {
                "page": [],
                "editorPreferences": []
            },
            "kit": {
                "global_image_lightbox": "yes",
                "lightbox_enable_counter": "yes",
                "lightbox_enable_fullscreen": "yes",
                "lightbox_enable_zoom": "yes",
                "lightbox_enable_share": "yes",
                "lightbox_title_src": "title",
                "lightbox_description_src": "description"
            },
            "post": {
                "id": 3777,
                "title": "Rehub%20Magazine%20demo%20%E2%80%93%20Rehub%20Magazine%20demo%20site",
                "excerpt": "",
                "featuredImage": false
            }
        };
    </script>

    <script defer src="{{ asset('theme/wp-content/aut_optimize.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    @yield('page-scripts')
</body>

</html>
<!-- Dynamic page generated in 0.443 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2021-03-05 06:32:22 -->

<!-- super cache -->