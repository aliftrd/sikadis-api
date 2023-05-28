<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="{{ $WEBSITE_DESCRIPTION }}">
    <meta name="keywords"
          content="{{ $WEBSITE_KEYWORDS }}">
    <link rel="shortcut icon" href="{{ asset('storage/' . $WEBSITE_LOGO) }}" type="image/x-icon">
    <meta name="author" content="Essential Developer">

    <title>{{ isset($title) ? join(' - ', [$title, $WEBSITE_TITLE ?? config('app.name', 'Laravel')]) : $WEBSITE_TITLE ?? config('app.name', 'Laravel') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/awesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/animate-css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/animated-headline/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/swiperjs/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/woocomerce.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    @stack('styles')
</head>
<body id="top-header">
<header class="header-style-2">
    <div class="header-navbar menu-2 navbar-sticky">
        <div class="container-fluid container-padding">
            <div class="d-flex align-items-center justify-content-between">
                <div class="site-logo">
                    <a href="{{ route('landing.welcome') }}">
                        <img src="{{ asset('storage/' . $WEBSITE_LOGO) }}" alt="Logo {{ $WEBSITE_TITLE }}"
                             class="img-fluid w-25"/>
                    </a>
                </div>

                <div class="offcanvas-icon d-block d-lg-none">
                    <a href="#" class="nav-toggler"><i class="fal fa-bars"></i></a>
                </div>

                <nav class="site-navbar ms-auto">
                    <ul class="primary-menu">
                        <li><a href="{{ route('landing.welcome') }}">Beranda</a></li>
                        <li><a href="{{ route('landing.news') }}">Berita</a></li>
                        @if($priority_pages->count() > 0)
                            <li>
                                <a href="#">Halaman</a>
                                <ul class="submenu">
                                    @foreach($priority_pages as $page)
                                        <li>
                                            <a href="{{ route('landing.single-page', $page->slug) }}">{{ $page->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                        <li>
                            <a href="#">PPDB</a>
                            <ul class="submenu">
                                <li><a href="{{ route('landing.ppdb.index') }}">Pendaftaran</a></li>
                                <li><a href="{{ route('landing.ppdb.show') }}">Cetak Formulir</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a href="#" class="nav-close"><i class="fal fa-times"></i></a>
                </nav>

            </div>
        </div>
    </div>
</header>
<!--====== Header End ======-->
@yield('content')
<!-- Footer section start -->
<section class="footer footer-4 pt-200">
    <div class="footer-mid">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 me-auto col-sm-8">
                    <div class="footer-logo mb-3">
                        <img src="{{ asset('storage/' . $WEBSITE_LOGO) }}" alt="Logo" class="img-fluid"
                             style="width: 100px;">
                    </div>
                    <div class="widget footer-widget mb-5 mb-lg-0">
                        <span class="text-white font-sm fw-bold">{{ $WEBSITE_TITLE }}</span>
                        <p class="w-75">{{ $WEBSITE_DESCRIPTION }}</p>
                    </div>
                </div>

                @if($priority_pages->count() > 0)
                    <div class="col-xl-2 col-sm-4">
                        <div class="footer-widget mb-5 mb-xl-0">
                            <h5 class="widget-title">Halaman</h5>
                            <ul class="list-unstyled footer-links">
                                @foreach($priority_pages as $page)
                                    <li><a href="{{ route('landing.single-page', $page->slug) }}">{{ $page->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="col-xl-2 col-sm-4">
                    <div class="footer-widget mb-5 mb-xl-0">
                        <h5 class="widget-title">Kontak</h5>
                        <ul class="list-unstyled footer-links">
                            <li><h6 class="text-white">Phone</h6><a href="#">{{ $implicit_setting['PHONE'] }}</a></li>
                            <li><h6 class="text-white">Email</h6><a href="#">{{ $implicit_setting['EMAIL'] }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-btm">
        <div class="container">
            <p class="mb-0 copyright text-sm-center text-lg-end">{{ join(' © ', [date('Y'), $WEBSITE_TITLE ?? config('app.name', 'Laravel')]) }}</p>
        </div>
    </div>

    <div class="fixed-btm-top">
        <a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
    </div>

</section>
<!-- Footer section End -->

<script src="{{ asset('frontend/vendors/jquery/jquery.js') }}"></script>
<script src="{{ asset('frontend/vendors/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('frontend/vendors/counterup/waypoint.js') }}"></script>
<script src="{{ asset('frontend/vendors/counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/owl/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/swiperjs/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/isotope/jquery.isotope.js') }}"></script>
<script src="{{ asset('frontend/vendors/isotope/imagelaoded.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/animated-headline/animated-headline.js') }}"></script>
<script src="{{ asset('frontend/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript">
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

<script src="{{ asset('frontend/js/script.js') }}"></script>
@stack('scripts')
</body>
</html>
