@extends('admin.MainAdmin')

@include('admin.sidebar')
@include('admin.NavbarAdmin')

@section('card')
    <div class="p-8 pl-6 ">
        <h1 class="font-medium text-2xl">Edit Jadwal {{ $jadwal->ID_Jadwal }}</h1>
        <form action="/admin/jadwal-perjalanan/update/{{ $jadwal->ID_Jadwal }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mt-8 grid gap-5">
                <div>
                    <label for="ID_Rute" class="text-sm text-gray-700 block mb-1 font-medium">ID_Rute</label>
                    <select name="ID_Rute"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                        <option selected>{{ $jadwal->ID_Rute }}</option>
                        @foreach ($rute as $ruteItem)
                            <option>{{ $ruteItem->ID_Rute }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="Tanggal_Keberangkatan" class="text-sm text-gray-700 block mb-1 font-medium">Tanggal
                        Keberangkatan</label>
                    <input type="date" name="Tanggal_Keberangkatan" value="{{ $jadwal->Tanggal }}"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                </div>

                <div>
                    <label for="ID_Bus" class="text-sm text-gray-700 block mb-1 font-medium">ID_Bus</label>
                    <select name="ID_Bus"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                        <option selected> {{ $jadwal->ID_Bus }}</option>
                        @foreach ($bus as $busItem)
                            <option>{{ $busItem->ID_Bus }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="Jumlah_Seat" class="text-sm text-gray-700 block mb-1 font-medium">Jumlah Seat</label>
                    <input type="text" name="Jumlah_Seat" value="{{ $jadwal->Jumlah_Seat }}"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                </div>

                <div>
                    <label for="Kelas_Bus" class="text-sm text-gray-700 block mb-1 font-medium">Kelas Bus</label>
                    <input type="text" name="Kelas_Bus" value="{{ $jadwal->Kelas_Bus }}"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                </div>

                <div>
                    <label for="Jam_Keberangkatan" class="text-sm text-gray-700 block mb-1 font-medium">Jam
                        Keberangkatan</label>
                    <input type="time" id="Jam_Keberangkatan" name="Jam_Keberangkatan"
                        value="{{ $jadwal->Jam_Keberangkatan }}"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                </div>

                <div>
                    <label for="Harga" class="text-sm text-gray-700 block mb-1 font-medium">Harga</label>
                    <input type="text" name="Harga" value="{{ $jadwal->Harga }}"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                </div>
                <div>
                    <label for="Status_Bus" class="text-sm text-gray-700 block mb-1 font-medium">Status Bus</label>
                    <input type="text" name="Status_Bus" value="{{ $jadwal->Status_Bus }}"
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
