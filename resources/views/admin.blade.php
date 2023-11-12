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
  <!-- Menu   -->
  <aside
    class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
    <div class="h-19.5">
      <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
        sidenav-close></i>
      <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
        <img src="{{URL('images/logo-mh.jpg')}}"
          class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-12" alt="main_logo" />
        <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand text-xl">MTI</span>
      </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-auto max-h-screen  h-sidenav grow basis-full">
      <ul class="flex flex-col pl-0 mb-0">
        <li class="mt-0.5 w-full">
          <a class="py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors"
            href="/build/index.html">
            <div
              class=" shadow-soft-2xl mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-black bg-center stroke-0 text-center xl:p-2.5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
              </svg>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Rute</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
            href="/build/pages/jadwal-perjalanan.html">
            <div
              class="shadow-soft-2xl mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
              </svg>

            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Jadwal Perjalanan</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
            href="/build/pages/data-perjalanan.html">
            <div
              class="shadow-soft-2xl mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
              </svg>

            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Data Perjalanan</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
            href="/build/pages/laporan.html">
            <div
              class="shadow-soft-2xl mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
              </svg>

            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Laporan Operasional</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
            href="/build/pages/tugas.html">
            <div
              class="shadow-soft-2xl mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
              </svg>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Data Tugas</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
            href="/builD/pages/bus.html">
            <div
              class="shadow-soft-2xl mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
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
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Bus</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
            href="/build/pages/sopir.html">
            <div
              class="shadow-soft-2xl mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <svg class="h-8 w-8 " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <circle cx="12" cy="12" r="9" />
                <path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1" />
                <circle cx="12" cy="7.5" r=".5" fill="currentColor" />
              </svg>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Sopir</span>
          </a>
        </li>
        <li class="mt-0.5 w-full">
          <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
            href="/build/pages/kernet.html">
            <div
              class="shadow-soft-2xl mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <svg class="h-8 w-8 " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <circle cx="12" cy="12" r="9" />
                <path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1" />
                <circle cx="12" cy="7.5" r=".5" fill="currentColor" />
              </svg>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Kernet</span>
          </a>
        </li>
        <li class="mt-0.5 w-full">
          <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
            href="/build/pages/agen.html">
            <div
              class="shadow-soft-2xl mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <svg class="h-8 w-8" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <circle cx="12" cy="12" r="9" />
                <path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1" />
                <circle cx="12" cy="7.5" r=".5" fill="currentColor" />
              </svg>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Agen</span>
          </a>
        </li>
        <li class="mt-0.5 w-full">
          <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
            href="/build/pages/gaji.html">
            <div
              class="shadow-soft-2xl mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
              </svg>

            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Gaji</span>
          </a>
        </li>
        <li class="mt-0.5 w-full">
          <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
            href="/build/pages/komisi.html">
            <div
              class="shadow-soft-2xl mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
              </svg>

            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Komisi Agen</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <!-- end Menu -->

  <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
    <!-- Navbar -->
    <nav
      class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl mt-4 lg:flex-nowrap lg:justify-start"
      navbar-main navbar-scroll="true">
      <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <div class="flex grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto justify-end">
          <div class="flex items-center">
            <button class="block px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-slate-500"
              id="adminButton">
              <i class="fa fa-user sm:mr-1"></i>
              <span class="hidden sm:inline">Admin</span>
            </button>
          </div>
          <div class="hidden ease-in-out relative z-10" id="adminDropdown">
            <div class=" bg-slate-200 flex flex-col rounded-xl absolute right-1 top-12 w-40 p-5 gap-3">
              <button><a href="#">Ubah Password</a></button>
              <button><a href="#">Logout</a></button>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- end Navbar -->

    <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto">
      <!-- tabel Rute -->
      <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
          <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border overflow-x-auto">
            <div
              class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex place-content-between flex-col gap-2">
              <h6>Tabel Rute</h6>
              <div class="flex justify-between">
                <div class="flex">
                  <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                    <input type="text"
                      class="pl-2 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                      placeholder="Cari Rute" />
                    <button class="pl-3">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                      </svg>

                    </button>
                  </div>
                </div>
                <a href="" class="bg-slate-500 text-white p-3 rounded-lg text-xs">+ Tambah Rute</a>
              </div>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2 mt-4">
              <div class="flex p-0">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                  <thead class="align-bottom">
                    <th
                      class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                      ID Rute</th>
                    <th
                      class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                      Rute</th>
                    <th
                      class="px-6 py-3  font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                      Lintasan Keberangkatan</th>
                    <th
                      class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                      Lintasan Tujuan</th>
                    <th
                      class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                      Jam Keberangkatan</th>
                  </thead>
                  <tbody>
                    <td class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="mb-0 text-xs font-semibold leading-tight ">Jalur-01</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="mb-0 text-xs font-semibold leading-tight">Tangerang - Pekalongan</p>
                    </td>
                    <td class="p-2 pl-6  align-middle bg-transparent border-b shadow-transparent ">
                      <p class="mb-0 text-xs font-semibold leading-tight">Poris-Kebun
                        Besar-Kalideres-Ring
                        Road-Jembatan Gantung-Pesakih-Grogol</p>
                    </td>
                    <td class="p-2 pl-6 align-middle bg-transparent border-b  shadow-transparent">
                      <p class="mb-0 text-xs font-semibold leading-tight ">
                        Pemalang-Bojong-Kajen-Karanganyar-Wonopringgo-Kedungwuni</p>
                    </td>
                    <td class="p-2 pl-6  align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="mb-0 text-xs font-semibold leading-tight">18.30</p>
                    </td>
                    <td class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                      </svg>
                    </td>
                    <td class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <a href=""><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                          stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>

                      </a>
                    </td>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


</body>

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