@extends('admin.MainAdmin')

@include('admin.sidebar')
@include('admin.Navbar')

@section('card')
<div class="w-full px-6 py-6 mx-auto">
    <!-- table komisi -->

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border overflow-x-auto">
                <div
                    class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex place-content-between">
                    <h6>Tabel Data Komisi Agen</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="flex p-0">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    ID Komisi</th>
                                <th
                                    class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Tanggal</th>
                                <th
                                    class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Jumlah Tiket</th>
                                <th
                                    class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Jumlah Komisi</th>
                                <th
                                    class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Tanggal Pembayaran</th>
                            </thead>
                            <tbody>
                                <td
                                    class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-xs font-semibold leading-tight ">KOAG01</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-xs font-semibold leading-tight">19/10/2023
                                    </p>
                                </td>
                                <td
                                    class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-xs font-semibold leading-tight">7</p>
                                </td>
                                <td class="p-2   align-middle bg-transparent border-b shadow-transparent ">
                                    <P class="mb-0 text-xs font-semibold leading-tight">105000</P>
                                </td>
                                <td class="p-2   align-middle bg-transparent border-b shadow-transparent ">
                                    <P class="mb-0 text-xs font-semibold leading-tight">19/10/2023</P>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection