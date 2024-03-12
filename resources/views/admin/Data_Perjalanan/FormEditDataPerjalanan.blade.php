@extends('admin.MainAdmin')

@include('admin.sidebar')
@include('admin.NavbarAdmin')

@section('card')
    <div class="p-8 pl-6 ">
        <h1 class="font-medium text-2xl">Edit Data Pejalanan {{ $DataPerjalanan->ID_Perjalanan }}</h1>
        <form action="/admin/data-perjalanan/update-data-perjalanan/{{ $DataPerjalanan->ID_Perjalanan }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mt-8 grid gap-5">
                <div class="flex gap-5">
                    <div>
                        <label for="Tanggal" class="text-sm text-gray-700 block mb-1 font-medium">Tanggal</label>
                        <input type="date" name="Tanggal" value="{{ $DataPerjalanan->Tanggal }}"
                            class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                    </div>
                </div>

                <div>
                    <label for="Jumlah_Tiket_Terjual" class="text-sm text-gray-700 block mb-1 font-medium">Jumlah Tiket
                        Terjual</label>
                    <input type="text" name="Jumlah_Tiket_Terjual"
                        value="{{ $DataPerjalanan->Jumlah_Tiket_Yang_Terjual }}"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                </div>

                <div>
                    <label for="Sisa_Tiket" class="text-sm text-gray-700 block mb-1 font-medium">Jumlah Sisa Tiket</label>
                    <input type="text" name="Sisa_Tiket" value="{{ $DataPerjalanan->Jumlah_Sisa_Tiket }}"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                </div>

                <div>
                    <label for="ID_Bus" class="text-sm text-gray-700 block mb-1 font-medium">ID_Bus</label>
                    <select name="ID_Bus"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                        <option selected> {{ $DataPerjalanan->ID_Bus }}</option>
                        @foreach ($bus as $busItem)
                            <option>{{ $busItem->ID_Bus }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="ID_Rute" class="text-sm text-gray-700 block mb-1 font-medium">ID_Rute</label>
                    <select name="ID_Rute"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                        <option selected>{{ $DataPerjalanan->ID_Rute }}</option>
                        @foreach ($rute as $ruteItem)
                            <option>{{ $ruteItem->ID_Rute }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="space-x-4 mt-8">
                <button type="submit"
                    class="py-2 px-4 bg-black text-white rounded hover:bg-slate-500 active:bg-blue-700 disabled:opacity-50">Save</button>

                <!-- Secondary -->
                <button
                    class="py-2 px-4 bg-white border border-gray-500 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50"><a
                        href="/admin/data-perjalanan">Cancel</a></button>
            </div>
        </form>
    </div>
@endsection
