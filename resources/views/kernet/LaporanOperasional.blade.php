@extends('kernet.MainKernet')
@extends('kernet.NavbarKernet')
@extends('kernet.SidebarKernet')

@section('cardsKernet')
    <section class="bg-white h-screen flex flex-col justify-center w-screen">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                <div class="flex-auto p-6 mt-10 bg-white h-screen  rounded-t-2xl border-4">
                    <h5 class="text-center">Laporan Operasional</h5>
                    <p>ID Jadwal : {{ $ID_Jadwal }}</p>
                    <p class="mt-[-20px]">ID Tugas : {{ $ID_Tugas }}</p>
                    <div class="form-container mt-4  h-full">
                        <form role="form text-left" method="POST" enctype="multipart/form-data"
                            action="{{ route('storeLaporanBiaya', ['ID_Jadwal' => $ID_Jadwal, 'ID_Tugas' => $ID_Tugas]) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-2 text-slate-100">
                                <div class="bg-gradient-to-tl from-gray-900 to-slate-800 p-4 rounded-4">
                                    <label for="Biaya_Tol" class="pb-2">Biaya Tol</label>
                                    <input type="text" name="Biaya_Tol" placeholder="Biaya Tol"
                                        class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-black bg-white bg-clip-padding py-2 px-3 font-normal text-black transition-all focus:border-fuchsia-300 focus:bg-white focus:text-black focus:outline-none focus:transition-shadow" />
                                    <label for="Struk_Biaya_Tol" class="pb-2">Struk Biaya Tol</label>
                                    <input type="file" name="Struk_Biaya_Tol" placeholder="Struk Biaya Tol"
                                        class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-black bg-white bg-clip-padding py-2 px-3 font-normal text-black transition-all focus:border-fuchsia-300 focus:bg-white focus:text-black focus:outline-none focus:transition-shadow" />
                                    <label for="Biaya_Bahan_Bakar" class="pb-2 mt-4">Biaya Bahan Bakar</label>
                                    <input type="text" name="Biaya_Bahan_Bakar" placeholder="Biaya Bahan Bakar"
                                        class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-black bg-white bg-clip-padding py-2 px-3 font-normal text-black transition-all focus:border-fuchsia-300 focus:bg-white focus:text-black focus:outline-none focus:transition-shadow" />
                                    <label for="Struk_Bahan_Bakar" class="pb-2 mt-4">Struk Bahan Bakar</label>
                                    <input type="file" name="Struk_Bahan_Bakar" placeholder="Struk Bahan Bakar"
                                        class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-black bg-white bg-clip-padding py-2 px-3 font-normal text-black transition-all focus:border-fuchsia-300 focus:bg-white focus:text-black focus:outline-none focus:transition-shadow" />
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="inline-block w-full px-6 py-3 mt-4 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
