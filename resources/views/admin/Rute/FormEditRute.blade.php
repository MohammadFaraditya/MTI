@extends('admin.MainAdmin')

@include('admin.sidebar')
@include('admin.NavbarAdmin')

@section('card')
    <div class="p-8 pl-6 ">
        <h1 class="font-medium text-2xl">Edit Rute {{ $ID }}</h1>
        <form action="{{ route('UpdateRute', ['ID_Rute' => $ID]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mt-8 grid gap-5">
                <div>
                    <label for="Kota_Keberangkatan" class="text-sm text-gray-700 block mb-1 font-medium">Kota
                        Keberangkatan</label>
                    <input type="text" id="Kota_Keberangkatan" name="Kota_Keberangkatan"
                        value = "{{ $DataeditRute->Kota_Keberangkatan }}"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                </div>

                <div>
                    <label for="Kota_Tujuan" class="text-sm text-gray-700 block mb-1 font-medium">Kota Tujuan</label>
                    <input type="text" id="Kota_Tujuan" name="Kota_Tujuan" value="{{ $DataeditRute->Kota_Tujuan }}"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                </div>

                <div>
                    <div class="flex">
                        <label for="Lintasan_Keberangkatan" class="text-sm text-gray-700 block mb-1 font-medium">Lintasan
                            Keberangkatan</label>
                        <label for="Jam_Keberangkatan" class="text-sm text-gray-700 block mb-1 font-medium pl-28">Jam
                            Keberangkatan
                    </div>
                    <div id="lintasankeberangkatan-form">
                        <!-- Input Pertama -->
                        @foreach ($LintasanKeberangkatan as $keberangkatan)
                            @if ($ID == $keberangkatan->ID_Rute)
                                @if ($keberangkatan->ID_Lintasan)
                                    <div id="jumlahIDKeberangkatan{{ $keberangkatan->ID_Lintasan }}">
                                        <div class="mb-3">
                                            <label for="keberangkatan">{{ $keberangkatan->Lintasan }}</label>
                                            <input type="text" name="keberangkatan{{ $keberangkatan->ID_Lintasan }}"
                                                id="keberangkatan{{ $keberangkatan->ID_Lintasan }}"
                                                value="{{ $keberangkatan->Nama_Lintasan }}"
                                                class="form-control bg-gray-100 border border-gray-200 rounded">
                                            <input type="text" name="Jam_Keberangkatan"
                                                class="form-control bg-gray-100 border border-gray-200 rounded"
                                                value="{{ $keberangkatan->Jam_Keberangkatan }}"
                                                id="jamkeberangkatan{{ $keberangkatan->ID_Lintasan }}">
                                            <button type="button"
                                                class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-2 border-b-4 border-red-500 hover:border-red-500 rounded"
                                                onclick="removeLintasanKeberangkatan('{{ $keberangkatan->ID_Lintasan }}')">Hapus</button>
                                        </div>
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <input type="text" name="keberangkatan[]"
                                            value="{{ $keberangkatan->Nama_Lintasan }}"
                                            class="form-control bg-gray-100 border border-gray-200 rounded"
                                            placeholder="Masukkan Lintasan 1" id="{{ $keberangkatan->ID_Lintasan }}">
                                        <button type="button"
                                            class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-2 border-b-4 border-red-500 hover:border-red-500 rounded"
                                            onclick="removeLintasanKeberangkatan(this)">Hapus</button>
                                    </div>
                                @endif
                            @endif
                        @endforeach

                    </div>

                    <button type="button"
                        class="bg-green-500 hover:bg-green-400 text-white font-bold py-1 px-2 text-sm border-b-4 border-green-700 hover:border-green-500 rounded"
                        onclick="addLintasanKeberangkatan()">Tambah Lintasan</button>

                </div>

                <div>
                    <div class="flex">
                        <label for="Lintasan_Tujuan" class="text-sm text-gray-700 block mb-1 font-medium">Lintasan
                            Tujuan</label>
                        <label for="Jam_Kedatangan" class="text-sm text-gray-700 block mb-1 font-medium pl-40">Jam
                            Kedatangan</label>
                    </div>
                    <div id="lintasantujuan-form">
                        <!-- Input Pertama -->
                        @foreach ($LintasanTujuan as $tujuan)
                            @if ($ID == $tujuan->ID_Rute)
                                @if ($tujuan->ID_Lintasan)
                                    <div id="jumlahIDTujuan{{ $tujuan->ID_Lintasan }}">
                                        <div class="mb-3">
                                            <label for="tujuan">{{ $tujuan->Lintasan }}</label>
                                            <input type="text" name="tujuan{{ $tujuan->ID_Lintasan }}"
                                                value="{{ $tujuan->Nama_Lintasan }}"
                                                class="form-control bg-gray-100 border border-gray-200 rounded">
                                            <input type="text" name="Jam_Kedatangan"
                                                class="form-control bg-gray-100 border border-gray-200 rounded"
                                                value="{{ $tujuan->Jam_Kedatangan }}" id="jamkedatangan">
                                            <button type="button"
                                                class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-2 border-b-4 border-red-500 hover:border-red-500 rounded"
                                                onclick="removeLintasanTujuan(this)">Hapus</button>
                                        </div>
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <input type="text" name="tujuan[]" value="{{ $tujuan->Nama_Lintasan }}"
                                            class="form-control bg-gray-100 border border-gray-200 rounded"
                                            placeholder="Masukkan Lintasan 1" id="{{ $tujuan->ID_Lintasan }}">
                                        <button type="button"
                                            class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-2 border-b-4 border-red-500 hover:border-red-500 rounded"
                                            onclick="removeLintasanTujuan(this)">Hapus</button>
                                    </div>
                                @endif
                            @endif
                        @endforeach

                    </div>

                    <button type="button"
                        class="bg-green-500 hover:bg-green-400 text-white font-bold py-1 px-2 text-sm border-b-4 border-green-700 hover:border-green-500 rounded"
                        onclick="addLintasanTujuan()">Tambah Lintasan</button>

                </div>

                <div>
                    <label for="Jam_Keberangkatan" class="text-sm text-gray-700 block mb-1 font-medium">Jam
                        Keberangkatan</label>
                    <input type="time" id="Jam_Keberangkatan" name="Jam_Keberangkatan"
                        value="{{ $DataeditRute->Jam_Keberangkatan }}"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                </div>
                <div>
                    <label for="Jam_Kedatangan" class="text-sm text-gray-700 block mb-1 font-medium">Jam
                        Kedatangan</label>
                    <input type="time" id="Jam_Kedatangan" name="Jam_Kedatangan"
                        value="{{ $DataeditRute->Jam_Kedatangan }}"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                </div>
            </div>

            <div class="space-x-4 mt-8">
                <button type="submit"
                    class="py-2 px-4 bg-black text-white rounded hover:bg-slate-500 active:bg-blue-700 disabled:opacity-50">Save</button>

                <!-- Secondary -->
                <button
                    class="py-2 px-4 bg-white border border-gray-500 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50"><a
                        href="/admin">Cancel</a></button>
            </div>
        </form>
    </div>
    <script src="{{ url('js/lintasanEdit.js') }}"></script>
@endsection
