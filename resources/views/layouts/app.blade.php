<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $siteConfigs['site_name']->value ?? 'Site Name' }}{{ isset($title) ? ' - ' . $title : '' }}</title>
    <meta name="description" content="{{ strip_tags($siteConfigs['description']->value) ?? 'Description...' }}" />
    <meta name="keywords" content="undangan digital, undangan online, undangan pernikahan, undangan acara, wedding invitation, save the date, kartu undangan, website undangan">
    <meta name="author" content="{{ $siteConfigs['site_name']->value ?? 'Author' }}">
    <meta name="website" content="{{ $siteConfigs['website_url']->value ?? 'https://example.com' }}">
    <meta name="email" content="{{ $siteConfigs['email']->value ?? 'example@email.com' }}">
    <meta name="version" content="1.0.0">

    <!-- favicon -->
    @if ($siteConfigs['favicon']->file)
        <link href="{{ Storage::url($siteConfigs['favicon']->file) }}" rel="shortcut icon">
    @else
        <link href="{{ asset('/') }}assets/hoxia-v1/images/favicon.ico" rel="shortcut icon">
    @endif

    <!-- Css -->
    <link href="{{ asset('/') }}assets/hoxia-v1/libs/tiny-slider/tiny-slider.css" rel="stylesheet">
    <!-- Main Css -->
    <link href="{{ asset('/') }}assets/hoxia-v1/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/hoxia-v1/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/hoxia-v1/css/tailwind.css">
    <link href="{{ asset('/') }}assets/fortawesome/fontawesome-free/css/all.css" rel="stylesheet" />
    <script src="{{ asset('/') }}assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('/') }}assets/tailwindcss/cdn-tailwindcss-3.3.3.js"></script>
    @stack('styles')
</head>

<body class="font-inter text-base text-slate-900 dark:text-white dark:bg-slate-900">
    <!-- Loader Start -->
    <div id="preloader">
        <div id="status">
            <div class="logo !mr-0">
                @if ($siteConfigs['favicon']->file)
                    <img src="{{ Storage::url($siteConfigs['favicon']->file) }}" class="h-14 w-14 d-block mx-auto animate-[spin_10s_linear_infinite] rounded-lg" alt="">
                @else
                    <img src="{{ asset('/') }}assets/hoxia-v1/images/logo-icon-64.png" class="h-14 w-14 d-block mx-auto animate-[spin_10s_linear_infinite] rounded-lg" alt="">
                @endif
            </div>
            <div class="justify-content-center">
                <div class="text-center">
                    <h4 class="mb-0 mt-2 text-lg font-semibold">{{ $siteConfigs['site_name']->value ?? 'Site Name' }}</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Loader End -->

    <!-- Tagline Start -->
    {{-- <div class="tagline bg-gradient-to-tr from-{{ $primary_color }}-500 to-{{ $primary_color }}-700">
        <div class="container relative">
            <div class="grid grid-cols-1">
                <div class="flex justify-between">
                    <ul class="list-none">
                        <li class="inline-flex items-center"><span data-feather="phone-outgoing" class="h-4 text-white me-1"></span><a href="tel:+152534-468-854" class="text-white/70 hover:text-white transition-all duration-500">+152 534-468-854</a></li>
                        <li class="inline-flex items-center ps-2"><span data-feather="mail" class="h-4 text-white me-1"></span><a href="mailto:contact@example.com" class="text-white/70 hover:text-white transition-all duration-500">contact@example.com</a></li>
                    </ul>

                    <ul class="list-none">
                        <li class="inline-flex items-center"><span data-feather="key" class="h-4 text-white me-1"></span><a href="login.html" class="text-white/70 hover:text-white transition-all duration-500">Login</a></li>
                        <li class="inline-flex items-center ps-2"><span data-feather="help-circle" class="h-4 text-white me-1"></span><a href="helpcenter-overview.html" class="text-white/70 hover:text-white transition-all duration-500">Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Tagline End -->
    <!-- Start Navbar -->
    @include('layouts.topnav')
    <!-- End Navbar -->

    <!-- Start Content -->
    @yield('content')
    <!-- End Content -->

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fixed hidden justify-center text-lg rounded-full z-10 bottom-5 end-5 h-9 w-9 text-center bg-{{ $primary_color }}-500 text-white leading-9"><i class="uil uil-arrow-up"></i></a>
    <!-- Back to top -->

    <!-- Footer Start -->
    @include('layouts.footer')
    <!-- Footer End -->

    <!-- Switcher -->
    <div class="fixed top-1/3 -right-2 z-3">
        <span class="relative inline-block rotate-90">
            <input type="checkbox" class="checkbox opacity-0 absolute" id="chk">
            <label class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">
                <i class="uil uil-moon text-[20px] text-yellow-500"></i>
                <i class="uil uil-sun text-[20px] text-yellow-500"></i>
                <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] w-7 h-7"></span>
            </label>
        </span>
    </div>
    <!-- Switcher -->

    <!-- LTR & RTL Mode Code -->
    {{-- <div class="fixed top-1/2 -right-3 z-50">
        <a href="" id="switchRtl">
            <span class="py-1 px-3 relative inline-block rounded-t-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold rtl:block ltr:hidden">LTR</span>
            <span class="py-1 px-3 relative inline-block rounded-t-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold ltr:block rtl:hidden">RTL</span>
        </a>
    </div> --}}
    <!-- LTR & RTL Mode Code -->

    <!-- JAVASCRIPTS -->
    <script src="{{ asset('/') }}assets/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('/') }}assets/hoxia-v1/libs/tiny-slider/min/tiny-slider.js"></script>
    <script src="{{ asset('/') }}assets/hoxia-v1/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('/') }}assets/hoxia-v1/js/plugins.init.js"></script>
    <script src="{{ asset('/') }}assets/hoxia-v1/js/app.js"></script>
    @stack('scripts')
    <!-- JAVASCRIPTS -->
</body>

</html>
