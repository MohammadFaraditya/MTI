@extends('admin.MainAdmin')

@include('admin.sidebar')
@include('admin.NavbarAdmin')

@section('card')
    <div class="p-8 pl-6 ">
        <h1 class="font-medium text-2xl">Tambah Bus</h1>
        <form action="/admin/bus/store-bus" method="POST">
            @csrf
            <div>
                <label for="ID_Bus" class="text-sm text-gray-700 block mb-1 font-medium">ID Bus</label>
                <input type="text" name="ID_Bus"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>

            <div>
                <label for="Bus_Model" class="text-sm text-gray-700 block mb-1 font-medium">Model Bus</label>
                <input type="text" name="Bus_Model"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>

            <div>
                <label for="Mesin_Bus" class="text-sm text-gray-700 block mb-1 font-medium">Mesin Bus</label>
                <input type="text" name="Mesin_Bus"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>
            <div>
                <label for="Tahun_Bus" class="text-sm text-gray-700 block mb-1 font-medium">Tahun Bus</label>
                <input type="text" name="Tahun_Bus"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>
            <div>
                <label for="Jadwal_Service" class="text-sm text-gray-700 block mb-1 font-medium">Jadwal Service</label>
                <input type="date" name="Jadwal_Service"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>
            <div>
                <label for="Status_Bus" class="text-sm text-gray-700 block mb-1 font-medium">Status Bus</label>
                <input type="text" name="Status_Bus" required
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>
            <div>
                <label for="Kelas_Bus" class="text-sm text-gray-700 block mb-1 font-medium">Kelas Bus</label>
                <input type="text" name="Kelas_Bus" required
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>
            <div>
                <label for="Jumlah_Seat" class="text-sm text-gray-700 block mb-1 font-medium">Jumlah_Seat</label>
                <input type="text" name="Jumlah_Seat" required
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>
    </div>

    <div class="space-x-4 p-4">
        <button type="submit"
            class="py-2 px-4 bg-black text-white rounded hover:bg-slate-500 active:bg-blue-700 disabled:opacity-50">Save</button>

        <!-- Secondary -->
        <button
            class="py-2 px-4 bg-white border border-gray-500 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50"><a
                href="/admin/bus">Cancel</a></button>
    </div>
    </form>
    </div>
@endsection
