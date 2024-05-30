@extends('agen.MainAgen')

@include('agen.NavbarAgen')
@include('agen.SidebarAgen')

@section('cardsAgen')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="w-full h-1/2  flex flex-col gap-4 rounded-lg mb-5">
            <div class="flex-auto px-0 pt-0 pb-2 mt-4 ">
                <div class="mb-4">
                    <h6 class="">Cari Pesanan Tiket</h6>
                    <form action="{{ route('searchPesanan') }}">
                        <select class="border-4 text-sm" name="tanggal">
                            @foreach ($tanggal as $datatanggal)
                                <option>{{ $datatanggal }}</option>
                            @endforeach
                        </select>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold  py-1 px-3 rounded text-sm">
                            Search
                        </button>
                    </form>
                </div>
                <div class="flex p-0 overflow-scroll">
                    <table class="items-center w-full mb-0 align-top bg-white text-slate-500 overflow-scroll">
                        <thead class="align-bottom">
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                ID Pesanan</th>
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Tanggal</th>
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Status</th>
                        </thead>
                        <tbody>
                            @foreach ($pesanan as $datapesanan)
                                @if ($datapesanan->ID_Akun == $user_id)
                                    <tr>
                                        <td
                                            class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                {{ $datapesanan->ID_Pesanan }}
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                {{ $datapesanan->Tanggal_Pesanan }}
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                {{ $datapesanan->Status_Pembayaran }}
                                            </p>
                                        </td>
                                        <td
                                            class="p-2  align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            @if ($datapesanan->Status_Pembayaran != 'Lunas')
                                                <form
                                                    action="{{ route('LunasDP', ['ID_Pesanan' => $datapesanan->ID_Pesanan]) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit"
                                                        class="bg-green-500 hover:bg-green-400 text-white font-bold py-1 px-2 text-sm border-b-4 border-green-700 hover:border-green-500 rounded">Lunas</button>
                                                </form>
                                            @endif
                                            <form
                                                action="{{ route('CancelPesanan', ['ID_Pesanan' => $datapesanan->ID_Pesanan]) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE') <!-- Or whatever method you need for cancel -->
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 text-sm border-b-4 border-red-500 hover:border-red-500 rounded">Cancel</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
