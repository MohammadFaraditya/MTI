@extends('admin.MainAdmin')

@include('admin.sidebar')
@include('admin.NavbarAdmin')

@include('sweetalert::alert')
@section('card')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table Data Perjalanan -->

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border overflow-x-auto">
                    <div
                        class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex place-content-between">
                        <div class="flex gap-5">
                            <a href="{{ route('index.jadwal') }}">
                                <h6>Tabel Jadwal Perjalanan</h6>
                            </a>
                            <form action="{{ route('search.jadwal') }}">
                                <select class="border-4 text-sm" name="tanggal">
                                    @foreach ($tanggal as $tanggal)
                                        <option>{{ $tanggal }}</option>
                                    @endforeach
                                </select>
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold  py-1 px-3 rounded text-sm">
                                    Search
                                </button>
                            </form>
                        </div>

                        <a href="/admin/jadwal-perjalanan/addjadwal"
                            class="bg-slate-500 text-white p-3 rounded-lg text-xs">+
                            Tambah
                            Jadwal</a>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="flex p-0">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID Jadwal</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Tanggal</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID Rute</th>
                                    <th
                                        class="px-6 py-3  font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID Bus</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Kelas Bus</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Jumlah Seat</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Jam Keberangkatan</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Harga</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Status Bus</th>
                                </thead>
                                <tbody>
                                    @foreach ($DataJadwal as $jadwal)
                                        <tr>
                                            <td
                                                class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight ">
                                                    {{ $jadwal->ID_Jadwal }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ $jadwal->Tanggal }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 pl-1 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ $jadwal->ID_Rute }}
                                                </p>
                                            </td>
                                            <td class="p-2 pl-6  align-middle bg-transparent border-b shadow-transparent ">
                                                <p class="mb-0 text-xs font-semibold leading-tight ">{{ $jadwal->ID_Bus }}
                                                </p>
                                            </td>
                                            <td class="p-2 pl-6 align-middle bg-transparent border-b shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight ">
                                                    {{ $jadwal->Kelas_Bus }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight ">
                                                    {{ $jadwal->Seat_Terisi }}
                                                    / {{ $jadwal->Jumlah_Seat }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 pl-6  align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ Carbon\Carbon::parse($jadwal->Jam_Keberangkatan)->format('H:i') }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 pl-6  align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">Rp.
                                                    {{ number_format($jadwal->Harga, 0, ',', '.') }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 pl-6  align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $jadwal->Status_Bus }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <a href="jadwal-perjalanan/editjadwal/{{ $jadwal->ID_Jadwal }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>
                                            </td>
                                            <td
                                                class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <form action="jadwal-perjalanan/delete/{{ $jadwal->ID_Jadwal }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </button>
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
        </div>
    </div>
@endsection
