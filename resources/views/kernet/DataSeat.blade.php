@extends('kernet.MainKernet')

@include('kernet.NavbarKernet')
@include('kernet.SidebarKernet')

@section('cardsKernet')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="w-full h-full flex flex-col gap-4 rounded-lg mb-5">
            <div class="flex-auto px-0 pt-0 pb-2 mt-4">
                <h6>ID Jadwal {{ $ID_Jadwal }}</h6>
                <div class="max-h-96 overflow-scroll border-4">
                    <table class="items-center w-full mb-0 align-top bg-white text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    No Seat
                                </th>
                                <th
                                    class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    ID Tiket
                                </th>
                                <th
                                    class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Nama Penumpang
                                </th>
                                <th
                                    class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    No Hp
                                </th>
                                <th
                                    class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Tujuan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($DataSeat->sortBy('No_Seat') as $seat)
                                <tr>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            {{ $seat->No_Seat }}
                                        </p>
                                    </td>
                                    @php
                                        $found = false;
                                    @endphp
                                    @foreach ($tiket as $datatiket)
                                        @if ($seat->No_Seat == $datatiket->No_Seat)
                                            <td
                                                class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $datatiket->ID_Tiket }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $datatiket->Nama_Penumpang }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $datatiket->No_Hp }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $datatiket->Tujuan }}
                                                </p>
                                            </td>
                                            @php
                                                $found = true;
                                            @endphp
                                        @break
                                    @endif
                                @endforeach
                                @if (!$found)
                                    <td colspan="4"
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            Seat Masih kosong
                                        </p>
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
@endsection
