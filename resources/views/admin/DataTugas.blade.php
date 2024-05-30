@extends('admin.MainAdmin')

@include('admin.sidebar')
@include('admin.NavbarAdmin')

@section('card')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- tabel Tugas -->

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border overflow-x-auto">
                    <div
                        class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex place-content-between">
                        <a href="{{ route('DataTugas') }}">
                            <h6>Tabel Data Tugas</h6>
                        </a>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="flex p-0">
                            <table class="w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            ID Tugas
                                        </th>
                                        <th
                                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            ID Jadwal
                                        </th>
                                        <th
                                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            ID Perjalanan
                                        </th>
                                        <th
                                            class="pl-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            ID Sopir 1
                                        </th>
                                        <th
                                            class="pl-8 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            ID Sopir 2
                                        </th>
                                        <th
                                            class="pl-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            ID Kernet
                                        </th>
                                        <th
                                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Tanggal Mulai
                                        </th>
                                        <th
                                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Tanggal Akhir
                                        </th>
                                        <th
                                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Laporan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($DataTugas as $tugas)
                                        <tr>
                                            <td
                                                class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ $tugas->ID_Tugas }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ $tugas->ID_Jadwal }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $tugas->ID_Perjalanan }}</p>
                                            </td>
                                            <td class="p-2 pl-6 align-middle bg-transparent border-b shadow-transparent">
                                                <a class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $tugas->Sopir_1 }}</a>
                                            </td>
                                            <td class="p-2 pl-8 align-middle bg-transparent border-b shadow-transparent">
                                                <a class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $tugas->Sopir_2 }}</a>
                                            </td>
                                            <td class="p-2 pl-6 align-middle bg-transparent border-b shadow-transparent">
                                                <a class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $tugas->Kernet }}</a>
                                            </td>
                                            <td class="p-2 pl-6 align-middle bg-transparent border-b shadow-transparent">
                                                <a class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $tugas->Tanggal_dan_Waktu_Tugas_Dimulai }}</a>
                                            </td>
                                            <td class="p-2 pl-6 align-middle bg-transparent border-b shadow-transparent">
                                                <a class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $tugas->Tanggal_dan_Waktu_Tugas_Berakhir }}</a>
                                            </td>
                                            <td class="p-2 pl-6 align-middle bg-transparent border-b shadow-transparent">
                                                <a class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $tugas->ID_Laporan_Biaya_Perjalanan }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
