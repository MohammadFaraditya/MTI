@extends('admin.MainAdmin')

@include('admin.sidebar')
@include('admin.NavbarAdmin')

@section('card')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- tabel Laporan -->

        <div class="flex flex-wrap -mx-3 ">
            <div class="flex-none w-full max-w-full px-3 ">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border overflow-x-auto">
                    <div
                        class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex place-content-between">
                        <h6>Tabel Laporan Operasional</h6>
                        <div class="">
                            <h6 class="">Cari Laporan Per Tanggal</h6>
                            <form action="{{ route('SearchLaporan') }}">
                                <select class="border-4 text-sm" name="tanggal">
                                    @foreach ($tanggal as $datatanggal)
                                        <option>{{ $datatanggal }}</option>
                                    @endforeach
                                </select>
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold  py-1 px-3 rounded text-sm">
                                    Search
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="flex p-0">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID Laporan</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Tanggal</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Total Pendapatan Bersih</th>

                                </thead>
                                <tbody>
                                    @foreach ($LaporanOperasional as $laporan)
                                        <tr>
                                            <td
                                                class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight ">
                                                    {{ $laporan->ID_Laporan_Operasional }}</p>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">
                                                    @foreach ($DataTugas as $tugas)
                                                        @if ($laporan->ID_Tugas == $tugas->ID_Tugas)
                                                            {{ $tugas->Tanggal_dan_Waktu_Tugas_Dimulai }}
                                                        @endif
                                                    @endforeach
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $laporan->Total_Pendapatan }}</p>
                                            </td>
                                            <td class="p-2 pl-6  align-middle bg-transparent border-b shadow-transparent ">
                                                <button type="button"
                                                    class="buttonDetail bg-green-500 hover:bg-green-400 text-white font-bold py-1 px-2 text-xss border-b-4 border-green-700 hover:border-green-500 rounded"
                                                    data-id="{{ $laporan->ID_Laporan_Operasional }}">
                                                    Rincian
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="relative z-50 hidden mt-[-200px] ml-96" id="detailLaporan">
                    <table
                        class="items-center mb-0 align-top border-gray-200 text-slate-500 absolute border-4 z-50 bg-white border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border w-1/3">
                        <tr>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                ID Laporan</th>
                            <td class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p id="rincianIdLaporan" class="mb-0 font-semibold leading-tight text-sm">: </p>
                            </td>
                        </tr>
                        <tr>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Tanggal</th>
                            <td class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p id="rincianTanggal" class="mb-0 font-semibold leading-tight text-sm">: </p>
                            </td>
                        </tr>
                        <tr>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                ID Tugas</th>
                            <td class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p id="rincianIdTugas" class="mb-0 font-semibold leading-tight text-sm">: </p>
                            </td>
                        </tr>
                        <tr>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Jumlah Pesanan</th>
                            <td class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p id="rincianJumlahPesanan" class="mb-0 font-semibold leading-tight text-sm">: </p>
                            </td>
                        </tr>
                        <tr>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Jumlah Tiket</th>
                            <td class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p id="rincianJumlahTiket" class="mb-0 font-semibold leading-tight text-sm">: </p>
                            </td>
                        </tr>
                        <tr>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Jumlah Pendapatan Tiket</th>
                            <td class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p id="rincianPendapatanTiket" class="mb-0 font-semibold leading-tight text-sm">: </p>
                            </td>
                        </tr>
                        <tr>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Biaya Perjalanan</th>
                            <td class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p id="rincianBiayaPerjalanan" class="mb-0 font-semibold leading-tight text-sm">: </p>
                            </td>
                        </tr>
                        <tr>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Biaya Gaji</th>
                            <td class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p id="rincianBiayaGaji" class="mb-0 font-semibold leading-tight text-sm">: </p>
                            </td>
                        </tr>
                        <tr>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Total Pendapatan</th>
                            <td class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p id="rincianTotalPendapatan" class="mb-0 font-semibold leading-tight text-sm">: </p>
                            </td>
                        </tr>
                        <tr>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            </th>
                            <td class="p-2 pl-24 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <button type="button" id="buttonDetailClose"
                                    class="bg-red-500 hover:bg-red-400 text-white font-bold py-1 px-4 text-sm border-b-4 border-red-700 hover:border-red-500 rounded">
                                    Close</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ URL('js/detailLaporan.js') }}"></script>
@endsection
