<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Undangan @stack('wedding_couple_name') - {{ $siteConfigs['site_name']->value ?? 'Site Name' }}</title>

    <!-- <link rel="icon" href="" type="image/x-icon" />
    <link rel="apple-touch-icon" href="" /> -->

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />

    <link href="{{ asset('/') }}assets/fortawesome/fontawesome-free/css/all.css" rel="stylesheet" />
    <link href="{{ asset('/') }}assets/aos/dist/aos.css" rel="stylesheet" />
    <link href="{{ asset('/') }}assets/fancyapps/ui/dist/fancybox/fancybox.css" rel="stylesheet" />
    <script src="{{ asset('/') }}assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('/') }}assets/moment/moment.js"></script>
    <script src="{{ asset('/') }}assets/moment-countdown/dist/moment-countdown.min.js"></script>
    {{-- <link href="{{ asset('/') }}assets/floral-template/tailwind-output.css" rel="stylesheet" /> --}}
    <link href="{{ asset('/') }}assets/floral-template/style-custom.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body class="font-worksans">

    @yield('content')

    <script src="{{ asset('/') }}assets/aos/dist/aos.js"></script>
    <script src="{{ asset('/') }}assets/fancyapps/ui/dist/fancybox/fancybox.umd.js"></script>
    <script src="{{ asset('/') }}assets/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('/') }}assets/floral-template/script-custom.js"></script>
    @stack('scripts')
</body>

</html>
