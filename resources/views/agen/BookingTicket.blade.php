@extends('agen.MainAgen')

@include('agen.NavbarAgen')
@include('agen.SidebarAgen')

@section('cardsAgen')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="w-full h-1/2 p-3 flex flex-col rounded-lg mb-5 bg-white">
            <p>ID Jadwal : {{ $DataJadwal->ID_Jadwal }}</p>
            @foreach ($Rute as $rute)
                @if ($DataJadwal->ID_Rute == $rute->ID_Rute)
                    <p>Rute: {{ $rute->Kota_Keberangkatan }} - {{ $rute->Kota_Tujuan }} </p>
                @endif
            @endforeach
            <p>Tanggal : {{ $DataJadwal->Tanggal }}</p>
            <p id="harga" class="hidden">{{ $DataJadwal->Harga }}</p>
        </div>
        <div class="w-full h-1/2 p-3 flex flex-col gap-4 rounded-lg mb-5 items-center ">
            <div class="flex justify-end w-3/4">
                <svg fill="#000000" height="50px" width="50px" version="1.1" id="Capa_1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 420.76 420.76" xml:space="preserve">
                    <path
                        d="M210.38,0C94.37,0,0,94.38,0,210.38c0,2.2,0.03,4.38,0.1,6.56c0.68,22.08,4.78,43.32,11.78,63.2
                                                                                                                                                                                                                                                                                                                                                     c28.84,81.83,106.93,140.62,198.5,140.62c91.59,0,169.7-58.83,198.51-140.69c7-19.88,11.1-41.11,11.77-63.19
                                                                                                                                                                                                                                                                                                                                                     c0.07-2.16,0.1-4.32,0.1-6.5C420.76,94.38,326.38,0,210.38,0z M83.931,258.73c3.685-1.125,7.402-2.218,11.186-3.243
                                                                                                                                                                                                                                                                                                                                                     c22.096-5.987,45.328-10.147,69.436-12.461l5.853,96.684C130.688,327.407,98.726,297.296,83.931,258.73z M212,242.98
                                                                                                                                                                                                                                                                                                                                                     c-15.74,0-28.5-12.76-28.5-28.5c0-15.74,12.76-28.5,28.5-28.5s28.5,12.76,28.5,28.5C240.5,230.22,227.74,242.98,212,242.98z
                                                                                                                                                                                                                                                                                                                                                     M250.495,339.666l5.85-96.637c24.055,2.312,47.245,6.461,69.31,12.432c3.784,1.022,7.501,2.114,11.186,3.237
                                                                                                                                                                                                                                                                                                                                                     C322.07,297.237,290.158,327.333,250.495,339.666z M332.986,189.901c-38.779-9.556-80.008-14.401-122.542-14.401
                                                                                                                                                                                                                                                                                                                                                     c-42.612,0-83.888,4.858-122.679,14.438c-3.916,0.966-7.784,1.995-11.629,3.054c0.093-0.72,0.17-1.444,0.275-2.161
                                                                                                                                                                                                                                                                                                                                                     C85.91,125.41,142.37,75,210.38,75c68,0,124.45,50.39,133.96,115.79c0.105,0.716,0.183,1.441,0.277,2.161
                                                                                                                                                                                                                                                                                                                                                     C340.771,191.893,336.902,190.865,332.986,189.901z" />
                </svg>
            </div>
            <div class="flex flex-wrap w-3/4 gap-2 justify-evenly ">
                @foreach ($seat->sortBy('No_Seat') as $dataseat)
                    @if ($dataseat->ID_Jadwal === $DataJadwal->ID_Jadwal)
                        @if ($dataseat->Available == true)
                            <button>
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="50px" height="50px"
                                    viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#FF0000"
                                        stroke="none">
                                        <path
                                            d="M1845 5014 c-480 -23 -1083 -78 -1206 -109 -94 -24 -254 -107 -335
                                                                                                                                                                                                                                                                                                                                                                                                                                                            -174 -126 -105 -226 -263 -276 -436 l-23 -80 0 -1850 0 -1850 23 -65 c26 -77
                                                                                                                                                                                                                                                                                                                                                                                                                                                            65 -138 128 -202 161 -164 394 -202 610 -101 112 52 245 210 269 320 3 18 9
                                                                                                                                                                                                                                                                                                                                                                                                                                                            33 12 33 2 0 70 -18 150 -40 496 -136 857 -185 1363 -185 506 0 867 49 1363
                                                                                                                                                                                                                                                                                                                                                                                                                                                            185 80 22 148 40 150 40 3 0 9 -15 12 -33 24 -110 157 -268 269 -320 126 -59
                                                                                                                                                                                                                                                                                                                                                                                                                                                            284 -72 399 -33 155 54 287 184 339 336 l23 65 0 1850 0 1850 -23 80 c-72 249
                                                                                                                                                                                                                                                                                                                                                                                                                                                            -225 436 -447 545 -132 65 -184 77 -464 106 -750 78 -1625 103 -2336 68z
                                                                                                                                                                                                                                                                                                                                                                                                                                                            m1375 -174 c474 -22 1098 -77 1215 -106 237 -60 424 -250 485 -491 20 -76 20
                                                                                                                                                                                                                                                                                                                                                                                                                                                            -114 18 -1898 l-3 -1820 -26 -55 c-33 -70 -99 -136 -169 -169 -47 -22 -69 -26
                                                                                                                                                                                                                                                                                                                                                                                                                                                            -150 -26 -82 0 -103 4 -150 26 -69 33 -133 97 -168 169 l-27 55 -5 1742 -5
                                                                                                                                                                                                                                                                                                                                                                                                                                                            1743 -26 25 c-24 24 -36 27 -225 45 -429 41 -1016 70 -1429 70 -408 0 -981
                                                                                                                                                                                                                                                                                                                                                                                                                                                            -28 -1419 -70 -189 -18 -201 -20 -225 -45 l-26 -25 -5 -1743 -5 -1742 -28 -56
                                                                                                                                                                                                                                                                                                                                                                                                                                                            c-37 -76 -117 -150 -192 -178 -82 -31 -196 -27 -275 10 -70 33 -136 99 -169
                                                                                                                                                                                                                                                                                                                                                                                                                                                            169 l-26 55 -3 1820 c-2 1784 -2 1822 18 1898 61 241 248 431 485 491 111 28
                                                                                                                                                                                                                                                                                                                                                                                                                                                            746 84 1180 105 251 12 1107 12 1355 1z" />
                                    </g>
                                    <text x="50%" y="50%" fill="#000000" dominant-baseline="middle" text-anchor="middle"
                                        font-size="150px">{{ $dataseat->No_Seat }}</text>
                                </svg>
                            </button>
                        @endif
                        @if ($dataseat->Available == false)
                            <button class="seat-button">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="50px" height="50px"
                                    viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill=""
                                        stroke="none">
                                        <path
                                            d="M1845 5014 c-480 -23 -1083 -78 -1206 -109 -94 -24 -254 -107 -335
                                                                                                                                                                                                                                                                                                                                                                                                                                                            -174 -126 -105 -226 -263 -276 -436 l-23 -80 0 -1850 0 -1850 23 -65 c26 -77
                                                                                                                                                                                                                                                                                                                                                                                                                                                            65 -138 128 -202 161 -164 394 -202 610 -101 112 52 245 210 269 320 3 18 9
                                                                                                                                                                                                                                                                                                                                                                                                                                                            33 12 33 2 0 70 -18 150 -40 496 -136 857 -185 1363 -185 506 0 867 49 1363
                                                                                                                                                                                                                                                                                                                                                                                                                                                            185 80 22 148 40 150 40 3 0 9 -15 12 -33 24 -110 157 -268 269 -320 126 -59
                                                                                                                                                                                                                                                                                                                                                                                                                                                            284 -72 399 -33 155 54 287 184 339 336 l23 65 0 1850 0 1850 -23 80 c-72 249
                                                                                                                                                                                                                                                                                                                                                                                                                                                            -225 436 -447 545 -132 65 -184 77 -464 106 -750 78 -1625 103 -2336 68z
                                                                                                                                                                                                                                                                                                                                                                                                                                                            m1375 -174 c474 -22 1098 -77 1215 -106 237 -60 424 -250 485 -491 20 -76 20
                                                                                                                                                                                                                                                                                                                                                                                                                                                            -114 18 -1898 l-3 -1820 -26 -55 c-33 -70 -99 -136 -169 -169 -47 -22 -69 -26
                                                                                                                                                                                                                                                                                                                                                                                                                                                            -150 -26 -82 0 -103 4 -150 26 -69 33 -133 97 -168 169 l-27 55 -5 1742 -5
                                                                                                                                                                                                                                                                                                                                                                                                                                                            1743 -26 25 c-24 24 -36 27 -225 45 -429 41 -1016 70 -1429 70 -408 0 -981
                                                                                                                                                                                                                                                                                                                                                                                                                                                            -28 -1419 -70 -189 -18 -201 -20 -225 -45 l-26 -25 -5 -1743 -5 -1742 -28 -56
                                                                                                                                                                                                                                                                                                                                                                                                                                                            c-37 -76 -117 -150 -192 -178 -82 -31 -196 -27 -275 10 -70 33 -136 99 -169
                                                                                                                                                                                                                                                                                                                                                                                                                                                            169 l-26 55 -3 1820 c-2 1784 -2 1822 18 1898 61 241 248 431 485 491 111 28
                                                                                                                                                                                                                                                                                                                                                                                                                                                            746 84 1180 105 251 12 1107 12 1355 1z" />
                                    </g>
                                    <text x="50%" y="50%" fill="#FFFFFF" dominant-baseline="middle" text-anchor="middle"
                                        font-size="150px">{{ $dataseat->No_Seat }}</text>
                                </svg>
                            </button>
                        @endif
                    @endif
                @endforeach

                <div class="w-full h-1/2 p-3 flex flex-col rounded-lg mb-5 bg-white mt-5">
                    <p>Jumlah Order : <span id="jumlah-order"></span></p>
                    <p>Harga : <span id="hargatotal"></span></p>
                    <button type="submit" class="p-2 bg-black text-white rounded-xl text-md mt-3">Data
                        Penumpang</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        // Fungsi Untuk merubah warna seat yang ingin di order
        document.querySelectorAll('.seat-button').forEach(button => {
            button.addEventListener('click', function() {
                let svg = this.querySelector('svg g');
                svg.setAttribute('fill', '#D49137');
                updateJumlahOrder();
                updateHarga();
            });
        });

        // Fungsi Untuk Menghitung Jumlah Order
        function updateJumlahOrder() {
            let jumlahOrderElements = document.querySelectorAll('[fill="#D49137"]');
            let jumlahOrder = jumlahOrderElements.length;
            document.getElementById('jumlah-order').textContent = jumlahOrder;
        }

        // Fungsi Untuk Menghitung Jumlah Harga
        function updateHarga() {
            let harga = document.getElementById('harga').textContent; // Mengambil harga dari teks
            let jumlahOrder = parseInt(document.getElementById('jumlah-order')
                .textContent); // Mendapatkan jumlah order dari teks
            let totalHarga = jumlahOrder * parseInt(harga); // Menghitung total harga
            let formattedHarga = formatRupiah(totalHarga); // Format harga menjadi mata uang Rupiah
            document.getElementById('hargatotal').textContent = formattedHarga; // Memperbarui harga di dalam elemen
        }

        // Fungsi untuk memformat harga menjadi mata uang Rupiah
        function formatRupiah(angka) {
            let reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return 'Rp. ' + ribuan;
        }
    </script>
@endsection
