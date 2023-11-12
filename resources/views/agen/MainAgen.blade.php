
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="{{URL('images/logo-mh.jpg')}}" />
  <title>Mahendra Transport Indonesia</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Popper -->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <!-- Main Styling -->
  <link href="../assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />
  @vite('resources/css/app.css')

  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
  <!-- sidenav  -->
  <aside
    class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full  flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-transparent p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent" id="menuAside">
    <div class="h-19.5 flex justify-between ">
      <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
        sidenav-close></i>
      <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
        <img src="{{URL('images/logo-mh.jpg')}}"
          class="inline w-12 h-12 transition-all duration-200 ease-nav-brand " alt="main_logo" />
        <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">MTI</span>
      </a>
      <button class="items-center p-5" id="buttonClose">
        <svg
              x-show="open"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="3"
              stroke="currentColor"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
      </button>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
      <ul class="flex flex-col pl-0 mb-0">
        <li class="mt-0.5 w-full">
          <a class="py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors"
            href="../pages/dashboard.html">
            <div
              class="bg-black shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg  bg-center stroke-0 text-center xl:p-2.5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
              </svg>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Jadwal</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
            href="../pages/tables.html">
            <div
              class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
              </svg>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Data Pesanan</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
            href="../pages/billing.html">
            <div
              class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
              <svg class="h-8 w-8 " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <circle cx="6" cy="17" r="2" />
                <circle cx="18" cy="17" r="2" />
                <path d="M4 17h-2v-11a1 1 0 0 1 1 -1h14a5 7 0 0 1 5 7v5h-2m-4 0h-8" />
                <polyline points="16 5 17.5 12 22 12" />
                <line x1="2" y1="10" x2="17" y2="10" />
                <line x1="7" y1="5" x2="7" y2="10" />
                <line x1="12" y1="5" x2="12" y2="10" />
          </svg>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Status Bus</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
            href="../pages/virtual-reality.html">
            <div
              class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
            </svg>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Pendapatan</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <!-- end sidenav -->

  <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
    <!-- Navbar -->
        <nav
            class="relative bg-black flex w-full items-center justify-between transition-all shadow-none duration-250 ease-soft-in "
            navbar-main navbar-scroll="true">
            <div class="h-full">
                <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-white xl:hidden"
                  sidenav-close></i>
                <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
                  <img src="{{URL('images/logo-mh.jpg')}}"
                    class="inline w-12 transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
                </a>
            </div>
            <div class="flex items-center p-4 gap-4">
              <div class="flex grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto justify-end">
                <div class="flex items-center">
                  <button class="block px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-slate-500"
                    id="adminButton">
                    <i class="fa fa-user text-2xl sm:mr-1"></i>
                    <span class="pl-1"></span>
                  </button>
                </div>
                <div class="hidden ease-in-out relative z-10" id="adminDropdown">
                  <div class=" bg-slate-200 flex flex-col rounded-xl absolute right-1 top-12 w-40 p-5 gap-3">
                    <button><a href="#">Ubah Password</a></button>
                    <button><a href="#">Logout</a></button>
                  </div>
                </div>
              </div>
              <div class="lg:hidden">
                <button  class=" text-white" id="buttonBurger">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-8 h-8"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                      />
                    </svg>
                  </button>
            </div>
            </div>
            
        </nav>

    <!-- end Navbar -->

    <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto ">
      <div class="w-full h-1/2 p-3 flex flex-col gap-4 rounded-lg mb-5">
        <div class="flex bg-white py-4 rounded-xl shadow-soft-xl">
          <div class="w-10 h-6 py-[11px] ">
            <svg class="svg-icon" viewBox="0 0 20 20">
                <path d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589"></path>
            </svg>
          </div>
          <div class="">
            <h6 class="text-black">Tujuan</h6>
            <select>
                <option value="pekalongan">Pekalongan</option>
                <option value="pemalang">Pemalang</option>
            </select>
          </div>
        </div>
        <div class="bg-white py-4 rounded-xl pl-4 shadow-soft-xl">
          <h6>Tanggal</h6>
          <input type="date">
        </div>
      </div>

      <div class="w-full p-3 rounded-lg relative ">
        <div class="bg-white p-3 text-xs w-full rounded-lg shadow-soft-xl">
          <div class="w-full">
            <h6>JLP-02</h6>
            <p class="font-extrabold text-lg">Tangerang - Pekalongan</p>
            <p>Jam Keberangkatan 07:00</p>
            <p>20 Kursi Tersedia</p>
            <p class="text-lg">Rp. 150.000</p>
          </div>
          <div class="absolute top-44 left-60">
            <button class=" bg-black py-3 px-4 text-white rounded-xl text-md">Pesan</button>
          </div>
      </div>

      <div>

      </div>
    </div>
</body>
<script src="{{URL('js/toggle.js')}}"></script>
</html>