@extends('sopir.MainSopir')

@include('sopir.NavbarSopir')
@include('sopir.SidebarSopir')

@section('cardsSopir')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="w-full h-1/2  flex flex-col gap-4 rounded-lg mb-5">
            <div class="flex-auto px-0 pt-0 pb-2 mt-4 ">
                <div class="flex p-0 overflow-scroll">
                    <table class="items-center w-full mb-0 align-top bg-white text-slate-500">
                        <thead class="align-bottom">
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                ID_Gaji</th>
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                ID_Tugas</th>

                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Jumlah Pendapatan</th>
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Status Pembayaran</th>
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Tanggal Pembayaran</th>
                        </thead>
                        <tbody>
                            @foreach ($gaji as $pendapatan)
                                <tr>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            {{ $pendapatan->ID_Gaji }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            {{ $pendapatan->ID_Tugas }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            {{ $pendapatan->Jumlah_Gaji }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            {{ $pendapatan->Status_Pembayaran }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            {{ $pendapatan->Tanggal_Pembayaran }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
