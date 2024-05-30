@extends('sopir.MainSopir')
@extends('sopir.NavbarSopir')
@extends('sopir.SidebarSopir')
@section('cardsSopir')
    <div class="w-full px-6 py-6 mx-auto ">
        <h5>Sopir Mahendra Transport Indonesia</h5>
        <h5>{{ $dataUser->ID_Akun }}-{{ $dataUser->Nama }}</h5>
        <br>
        <div class="w-full bg-white p-4 rounded-xl shadow-soft-xl ">
            @if (!$dataTugas)
                <h5> Tidak Ada Tugas</h5>
            @endif
            @if ($dataTugas)
                <h5>Tugas</h5>
                <table class="text-md">
                    @foreach ($dataTugas as $tugas)
                        <tr>
                            <th class="text-left ">ID Tugas</th>
                            <td class="pl-1">: {{ $tugas->ID_Tugas }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">ID Perjalanan</th>
                            <td class="pl-1">: {{ $tugas->ID_Perjalanan }}JL02</td>
                        </tr>
                        <tr>
                            <th class="text-left ">ID Bus</th>
                            <td class="pl-1">: {{ $dataUser->ID_Bus }}</td>
                        </tr>
                        <tr>
                            <th class="text-left ">Rute</th>
                            <td class="pl-1">: {{ $dataRute->Kota_Keberangkatan }} - {{ $dataRute->Kota_Tujuan }}</td>
                        </tr>
                        <tr>
                            <th class="text-left align-top">Penjemputan</th>
                            <td class="pl-1">:
                                @foreach ($lintasanKeberangkatan->sortBy('Jam_Keberangkatan') as $lintasan)
                                    {{ $lintasan->Nama_Lintasan }},
                                @endforeach
                            </td>

                        </tr>
                        <tr>
                            <th class="text-left align-top">Tujuan</th>
                            <td class="pl-1">:
                                @foreach ($lintasanTujuan->sortBy('Jam_Kedatangan') as $lintasan)
                                    {{ $lintasan->Nama_Lintasan }},
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection
