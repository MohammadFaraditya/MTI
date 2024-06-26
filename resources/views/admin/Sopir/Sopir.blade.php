@extends('admin.MainAdmin')

@include('admin.sidebar')
@include('admin.NavbarAdmin')

@section('card')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table Sopir -->

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border overflow-x-auto">
                    <div
                        class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex place-content-between">
                        <div class="flex gap-6">
                            <a href="{{ route('index.adminSopir') }}">
                                <h6 class="text-xl">Tabel Sopir</h6>
                            </a>
                            <form action="{{ route('search.sopir') }}" method="GET">
                                <div
                                    class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                                    <input type="search"
                                        class="pl-2 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-300 focus:outline-none focus:transition-shadow"
                                        placeholder="Cari Sopir" name="search" />
                                    <button class="pl-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <a href="sopir/add-sopir" class="bg-slate-500 text-white p-3 rounded-lg text-xs">+ Tambah
                            Sopir</a>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="flex p-0">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID Sopir</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Nama</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        No Telepon</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Alamat</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Kota Kelahiran</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Tanggal Lahir</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        No SIM</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Username</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Password</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID Bus</th>
                                    <th
                                        class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Status</th>
                                </thead>
                                <tbody>
                                    @foreach ($sopir as $sopir)
                                        <tr>
                                            <td
                                                class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight ">{{ $sopir->ID_Akun }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ $sopir->Nama }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 pl-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ $sopir->No_Telepon }}
                                                </p>
                                            </td>
                                            <td class="p-2   align-middle bg-transparent border-b shadow-transparent ">
                                                <a
                                                    class="mb-0 text-xs font-semibold leading-tight ">{{ $sopir->Alamat }}</a>
                                            </td>
                                            <td class="p-2  align-middle bg-transparent border-b shadow-transparent ">
                                                <a
                                                    class="mb-0 text-xs font-semibold leading-tight ">{{ $sopir->Kota_Kelahiran }}</a>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b shadow-transparent ">
                                                <a
                                                    class="mb-0 text-xs font-semibold leading-tight ">{{ $sopir->Tanggal_Lahir }}</a>
                                            </td>
                                            <td class="p-2  align-middle bg-transparent border-b shadow-transparent ">
                                                <a
                                                    class="mb-0 text-xs font-semibold leading-tight ">{{ $sopir->No_SIM }}</a>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b shadow-transparent ">
                                                <a
                                                    class="mb-0 text-xs font-semibold leading-tight ">{{ $sopir->Username }}</a>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b shadow-transparent ">
                                                <a
                                                    class="mb-0 text-xs font-semibold leading-tight ">{{ substr($sopir->Password, 0, 7) }}...</a>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b shadow-transparent ">
                                                <a
                                                    class="mb-0 text-xs font-semibold leading-tight ">{{ $sopir->ID_Bus }}</a>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b shadow-transparent ">
                                                <a
                                                    class="mb-0 text-xs font-semibold leading-tight ">{{ $sopir->Status }}</a>
                                            </td>
                                            <td
                                                class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <a href="sopir/edit-sopir/{{ $sopir->ID_Akun }}"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>
                                            </td>
                                            <td
                                                class="p-2 pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <form action="sopir/delete-sopir/{{ $sopir->ID_Akun }}" method="POST">
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
