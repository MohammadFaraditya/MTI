<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ URL('images/logo-mh.jpg') }}" />
    <title>Mahendra Transport Indonesia</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <link href="../assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />
    @vite('resources/css/app.css')
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body
    class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500 overflow-x-hidden">
    <!-- sidenav -->
    @yield('sidebarKernet')
    <!-- end sidenav -->
    <main
        class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200 overflow-hidden">
        <!-- Navbar -->
        @yield('navbarKernet')
        <!-- end Navbar -->
        <!-- cards -->
        @yield('cardsKernet')
    </main>
    <script src="{{ URL('js/toggleKernet.js') }}" defer></script>
    <script src="{{ URL('js/sideKernet.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
</body>

</html>
