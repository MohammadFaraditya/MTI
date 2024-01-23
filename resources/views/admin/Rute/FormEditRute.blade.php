@extends('admin.MainAdmin')

@include('admin.sidebar')
@include('admin.NavbarAdmin')

@section('card')
    <div class="p-8 pl-6 ">
        <h1 class="font-medium text-2xl">Edit Rute {{ $ID }}</h1>
        <form action="/admin/{{ $ID }}" method="POST">
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
                    <label for="Lintasan_Keberangkatan" class="text-sm text-gray-700 block mb-1 font-medium">Lintasan
                        Keberangkatan</label>
                    <input type="text" id="Lintasan_Keberangkatan" name="Lintasan_Keberangkatan"
                        value="{{ $DataeditRute->Lintasan_Keberangkatan }}"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                </div>

                <div>
                    <label for="Lintasan_Tujuan" class="text-sm text-gray-700 block mb-1 font-medium">Lintasan
                        Tujuan</label>
                    <input type="text" id="Lintasan_Tujuan" name="Lintasan_Tujuan"
                        value="{{ $DataeditRute->Lintasan_Tujuan }}"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                </div>

                <div>
                    <label for="Jam_Keberangkatan" class="text-sm text-gray-700 block mb-1 font-medium">Jam
                        Keberangkatan</label>
                    <input type="time" id="Jam_Keberangkatan" name="Jam_Keberangkatan"
                        value="{{ $DataeditRute->Jam_Keberangkatan }}"
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
@endsection
