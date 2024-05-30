@extends('agen.MainAgen')

@include('agen.NavbarAgen')
@include('agen.SidebarAgen')

@section('cardsAgen')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="w-full h-1/2  flex flex-col gap-4 rounded-lg mb-5">
            <div class="flex-auto px-0 pt-0 pb-2 mt-4 ">
                <div class="mb-4">
                    <h6 class="">Cari Pendapatan </h6>
                    <form action="{{ route('SearchPendapatan') }}">
                        <select class="border-4 text-sm" name="tanggal">
                            @foreach ($pesanan as $datapesanan)
                                <option>{{ $datapesanan->Tanggal_Pesanan }}</option>
                            @endforeach
                        </select>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold  py-1 px-3 rounded text-sm">
                            Search
                        </button>
                    </form>
                </div>
                <div class="flex p-0 overflow-scroll">
                    <table class="items-center w-full mb-0 align-top bg-white text-slate-500">
                        <thead class="align-bottom">
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                ID_Pendapatan</th>
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                ID_Pesanan</th>
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Tanggal_Pesanan</th>
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Jumlah_Komisi</th>
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Status Pembayaran</th>
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Tanggal Pembayaran</th>
                        </thead>
                        <tbody>
                            @foreach ($komisi_agen as $komisi)
                                <tr>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            {{ $komisi->ID_Komisi }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            {{ $komisi->ID_Pesanan }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            @foreach ($pesanan as $datapesanan)
                                                @if ($datapesanan->ID_Pesanan == $komisi->ID_Pesanan)
                                                    {{ $datapesanan->Tanggal_Pesanan }}
                                                @endif
                                            @endforeach
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            {{ $komisi->Jumlah_Komisi }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            {{ $komisi->Status_Pembayaran }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            {{ $komisi->Tanggal_Pembayaran }}
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
