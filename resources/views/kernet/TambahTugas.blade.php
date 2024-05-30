@extends('kernet.MainKernet')

@include('kernet.NavbarKernet')
@include('kernet.SidebarKernet')

@section('cardsKernet')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="w-full h-1/2 flex flex-col gap-4 rounded-lg mb-5">
            <div class="flex-auto px-0 pt-0 pb-2 mt-4">
                <div class="flex p-0 overflow-scroll">
                    <table class="items-center w-full mb-0 align-top bg-white text-slate-500 overflow-scroll">
                        <thead class="align-bottom">
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                ID Tugas
                            </th>
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Tanggal
                            </th>
                            <th
                                class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Tugas Tambahan
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($tugas as $dataTugas)
                                <tr>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            {{ $dataTugas->ID_Tugas }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            {{ $dataTugas->Tanggal_dan_Waktu_Tugas_Dimulai }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            @if (is_null($dataTugas->Kernet))
                                                Tugas Kernet
                                            @endif
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <form
                                            action="{{ route('TambahTugasKernet', ['ID_Tugas' => $dataTugas->ID_Tugas]) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-400 text-white font-bold py-1 px-2 text-sm border-b-4 border-green-700 hover:border-green-500 rounded">
                                                Tambah</button>
                                        </form>
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
