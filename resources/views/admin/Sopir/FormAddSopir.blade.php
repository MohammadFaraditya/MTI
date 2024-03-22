@extends('admin.MainAdmin')

@include('admin.sidebar')
@include('admin.NavbarAdmin')

@section('card')
    <div class="p-8 pl-6 ">
        <h1 class="font-medium text-2xl">Tambah Sopir</h1>
        <form action="/admin/sopir/store-sopir" method="POST">
            @csrf
            <div>
                <label for="ID_Sopir" class="text-sm text-gray-700 block mb-1 font-medium">ID_Sopir</label>
                <input type="text" name="ID_Sopir"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>

            <div>
                <label for="Nama_Sopir" class="text-sm text-gray-700 block mb-1 font-medium">Nama Sopir</label>
                <input type="text" name="Nama_Sopir"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>

            <div>
                <label for="No_Telepon" class="text-sm text-gray-700 block mb-1 font-medium">No Telepon</label>
                <input type="text" name="No_Telepon"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>

            <div>
                <label for="Alamat" class="text-sm text-gray-700 block mb-1 font-medium">Alamat</label>
                <input type="text" name="Alamat"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>

            <div>
                <label for="Kota_Kelahiran" class="text-sm text-gray-700 block mb-1 font-medium">Kota Kelahiran</label>
                <input type="text" name="Kota_Kelahiran"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>

            <div>
                <label for="Tanggal_Lahir" class="text-sm text-gray-700 block mb-1 font-medium">Tanggal Lahir</label>
                <input type="date" name="Tanggal_Lahir"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>

            <div>
                <label for="No_SIM" class="text-sm text-gray-700 block mb-1 font-medium">No SIM</label>
                <input type="text" name="No_SIM"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>

            <div>
                <label for="Username" class="text-sm text-gray-700 block mb-1 font-medium">Username</label>
                <input type="text" name="Username"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>

            <div>
                <label for="Password" class="text-sm text-gray-700 block mb-1 font-medium">Password</label>
                <input type="password" name="Password"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
            </div>

            <div>
                <label for="ID_Bus" class="text-sm text-gray-700 block mb-1 font-medium">ID_Bus</label>
                <select name="ID_Bus"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                    @foreach ($bus as $busItem)
                        <option>{{ $busItem->ID_Bus }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="Status" class="text-sm text-gray-700 block mb-1 font-medium">Status</label>
                <input type="text" name="Status"
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
