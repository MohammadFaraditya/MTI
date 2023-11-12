<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="{{URL('images/logo-mh.jpg')}}" />
  <title>Mahendra Transport Indonesia</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Main Styling -->
  @vite('resources/css/app.css')
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

    @yield('sidebar')

  
  <!-- end Menu -->

  <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
    <!-- Navbar -->

      @yield('navbar')

    <!-- end Navbar -->

      @yield('card')

    <!-- cards -->
  </main>
</body>
<script src="{{URL('js/side.js')}}"></script>
<!-- Sertakan library anime.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>

<script>
  // Ambil elemen tombol admin dan dropdown admin
  let adminButton = document.getElementById("adminButton");
  let adminDropdown = document.getElementById("adminDropdown");

  // Inisialisasi status tersembunyi
  let isHidden = true;

  // Tambahkan event listener ke tombol admin
  adminButton.addEventListener("click", function () {
    // Periksa status tersembunyi
    if (isHidden) {
      // Jika tersembunyi, tampilkan dengan efek seperti air terjun
      adminDropdown.style.display = "block";
      anime({
        targets: adminDropdown,
        translateY: [-50, 0], // Geser elemen dari atas ke bawah
        opacity: [0, 1], // Ubah opacity dari 0 (sembunyi) menjadi 1 (tampil)
        duration: 500, // Durasi animasi dalam milidetik
        easing: 'easeOutExpo' // Efek animasi
      });
    } else {
      // Jika sudah terlihat, sembunyikan dengan efek sebaliknya
      anime({
        targets: adminDropdown,
        translateY: [0, -50], // Geser elemen dari bawah ke atas
        opacity: [1, 0], // Ubah opacity dari 1 (tampil) menjadi 0 (sembunyi)
        duration: 500, // Durasi animasi dalam milidetik
        easing: 'easeOutExpo', // Efek animasi
        complete: function (anim) {
          adminDropdown.style.display = "none"; // Setelah animasi selesai, sembunyikan elemen
        }
      });
    }

    // Ubah status tersembunyi
    isHidden = !isHidden;
  });
</script>
</html>