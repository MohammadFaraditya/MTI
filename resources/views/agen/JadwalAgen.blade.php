@extends('agen.MainAgen')

@include('agen.NavbarAgen')
@include('agen.SidebarAgen')

@section('cardsAgen')
    <div class="w-full px-6 py-6 mx-auto ">
        <div class="w-full h-1/2 p-3 flex flex-col gap-4 rounded-lg mb-5">
            <form action="{{ route('agenSearchJadwal') }}">
                <div class="flex bg-white py-4 rounded-xl shadow-soft-xl">
                    <div class="w-10 h-6 py-[11px] ">
                        <svg class="svg-icon" viewBox="0 0 20 20">
                            <path
                                d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589">
                            </path>
                        </svg>
                    </div>
                    <div class="">
                        <h6 class="text-black">Tujuan</h6>
                        <select name="Tujuan">
                            @foreach ($rute as $dataRute)
                                <option value="pekalongan">{{ $dataRute->Kota_Tujuan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="bg-white py-4 rounded-xl pl-4 shadow-soft-xl">
                    <h6>Tanggal</h6>
                    <input type="date" name="tanggal">
                </div>

                <button class=" py-4 px-32 bg-black text-white rounded-xl text-md mt-3">Search</button>
            </form>
        </div>

        @if ($DataJadwal != null)
            <div class="w-full p-3 rounded-lg relative ">
                @foreach ($DataJadwal as $dataJadwal)
                    @foreach ($rute as $dataRute)
                        <div class="bg-white p-3 text-xs w-full rounded-lg shadow-soft-xl mt-5">
                            <div class="w-full">
                                <h6>{{ $dataJadwal->ID_Jadwal }} {{ $dataJadwal->Tanggal }}</h6>
                                @if ($dataRute->ID_Rute == $dataJadwal->ID_Rute)
                                    <p class="font-extrabold text-lg">Rute : {{ $dataRute->Kota_Keberangkatan }} -
                                        {{ $dataRute->Kota_Tujuan }}</p>
                                @endif
                                <p>Jam Keberangkatan : {{ $dataJadwal->Jam_Keberangkatan }}</p>
                                <p>20 Kursi Tersedia</p>
                                <p class="text-lg"> Harga : {{ $dataJadwal->Harga }}</p>
                            </div>
                            <button class=" bg-black py-3 px-4 text-white rounded-xl text-md w-full">Pesan</button>

                        </div>
                    @endforeach
                @endforeach
        @endif


    </div>
@endsection
