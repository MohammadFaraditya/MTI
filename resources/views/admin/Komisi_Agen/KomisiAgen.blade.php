@extends('admin.MainAdmin')

@include('admin.sidebar')
@include('admin.NavbarAdmin')

@section('card')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table komisi -->

        <div class="flex flex-wrap -mx-3">
            <div class="relative hidden" id="FormKomisi">
                <div class=" ease-in-out absolute z-10">
                    <div
                        class="absolute p-10 z-100 flex flex-col min-w-0 break-words bg-blue-400 border-0 shadow-soft-xl rounded-2xl bg-clip-border ml-96">

                        <div class="p-2 mb-0 text-center">
                            <h5 class="mt-6 text-white">Ubah Komisi Agen</h5>
                        </div>
                        @foreach ($komisi as $komisiGaji)
                            <div class="flex-auto p-6">
                                <form role="form text-left"
                                    action="/admin/komisi-agen/ubah-komisi-agen/{{ $komisiGaji->ID_GajiKomisi }}"
                                    method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="mb-4">
                                        <input type="text"
                                            class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-black bg-white bg-clip-padding py-2 px-3 font-normal text-black transition-all focus:border-green-500 focus:bg-white focus:text-black  focus:outline-none focus:transition-shadow"
                                            name="komisi" />
                                    </div>

                                    <div class="flex justify-around gap-4">
                                        <div class="text-center">
                                            <button type="submit"
                                                class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Submit</button>
                                        </div>
                                        <div class="text-center" id="cancelForm">
                                            <button
                                                class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Cancel</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border overflow-x-auto">
                    <div class="flex justify-between">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h5>Tabel Data Komisi Agen</h5>
                            @foreach ($komisi as $komisi)
                                <h6>Komisi Agen = {{ $komisi->Komisi_Agen }}%</h6>
                            @endforeach
                        </div>
                        <button class="bg-slate-500 text-white p-3 rounded-lg text-xs h-10 mt-10 mx-4" id="ButtonKomisi">
                            Ubah Komisi Agen
                        </button>
                    </div>


                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="flex p-0">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID Komisi</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID Akun</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Nama Agen</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID_Pesanan</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Tanggal Pesanan</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Jumlah Tiket</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Jumlah Komisi</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Status Pembayaran</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Tanggal Pembayaran</th>
                                </thead>
                                <tbody>
                                    @foreach ($komisiAgen as $komisiAgen)
                                        <tr>
                                            <td
                                                class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight ">
                                                    {{ $komisiAgen->ID_Komisi }}</p>
                                            </td>
                                            <td
                                                class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight ">
                                                    {{ $komisiAgen->ID_Akun }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                @foreach ($user as $datauser)
                                                    @if ($datauser->ID_Akun == $komisiAgen->ID_Akun)
                                                        <p class="mb-0 text-xs font-semibold leading-tight ">
                                                            {{ $datauser->Nama }}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td
                                                class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight ">
                                                    {{ $komisiAgen->ID_Pesanan }}</p>
                                            </td>
                                            <td
                                                class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                @foreach ($pesananTiket as $pesanan)
                                                    @if ($pesanan->ID_Pesanan == $komisiAgen->ID_Pesanan)
                                                        <p class="mb-0 text-xs font-semibold leading-tight ">
                                                            {{ $pesanan->Tanggal_Pesanan }}</p>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td
                                                class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $komisiAgen->Jumlah_Tiket }}</p>
                                            </td>
                                            <td class="p-2   align-middle bg-transparent border-b shadow-transparent ">
                                                <P class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $komisiAgen->Jumlah_Komisi }}</P>
                                            </td>
                                            <td class="p-2   align-middle bg-transparent border-b shadow-transparent ">
                                                <P class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $komisiAgen->Status_Pembayaran }}</P>
                                            </td>
                                            <td class="p-2   align-middle bg-transparent border-b shadow-transparent ">
                                                <P class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $komisiAgen->Tanggal_Pembayaran }}</P>
                                            </td>
                                            @if ($komisiAgen->Status_Pembayaran == 'Belum Dibayar')
                                                <td>
                                                    <form
                                                        action="komisi-agen/update-pembayaran/{{ $komisiAgen->ID_Komisi }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit"
                                                            class="bg-green-500 hover:bg-blue-400 text-white font-bold text-sm py-1 px-4 border-b-4 border-green-700 hover:border-blue-500 rounded">Bayar</button>
                                                    </form>
                                                </td>
                                            @endif
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
    <script src="{{ URL('js/editKomisi.js') }}"></script>
@endsection
