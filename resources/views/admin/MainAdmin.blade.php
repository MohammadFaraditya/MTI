<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ URL('images/logo-mh.jpg') }}" />
    <title>Mahendra Transport Indonesia</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Main Styling -->
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="m-0 text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

    @yield('sidebar')

    <!-- end Menu -->

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <!-- Navbar -->

        @yield('navbarAdmin')

        <!-- end Navbar -->

        @yield('card')

        <!-- cards -->
    </main>
    @include('sweetalert::alert')
    @if (isset($success))
        <script>
            import Swal from 'sweetalert2'

            // or via CommonJS
            const Swal = require('sweetalert2')

            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Your work has been saved",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
</body>

<script src="{{ URL('js/side.js') }}"></script>
<!-- Sertakan library anime.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>

<script src="{{ URL('js/admin.js') }}"></script>


</html>
