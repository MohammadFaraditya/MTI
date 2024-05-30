@extends('kernet.MainKernet')
@extends('kernet.NavbarKernet')
@extends('kernet.SidebarKernet')
@section('cardsKernet')
    <div class="w-full px-6 py-6 mx-auto ">
        <h5>Kernet Mahendra Transport Indonesia - {{ $dataUser->ID_Akun }}-{{ $dataUser->Nama }}</h5>
        <br>
        <div class="w-full bg-white p-4 rounded-xl shadow-soft-xl overflow-scroll">
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
                        <tr>
                            <th class="text-left align-top">Data Seat</th>
                            <td>
                                <a href="{{ route('DataSeat', ['ID_Jadwal' => $tugas->ID_Jadwal]) }}">
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-400 text-white font-bold py-1 px-2 text-sm border-b-4 border-green-700 hover:border-green-500 rounded">
                                        Data Seat</button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-left align-top">Laporan Operasional</th>
                            <td>
                                <a
                                    href="{{ route('ShowReport', ['ID_Jadwal' => $tugas->ID_Jadwal, 'ID_Tugas' => $tugas->ID_Tugas]) }}">
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-400 text-white font-bold py-1 px-2 text-sm border-b-4 border-green-700 hover:border-green-500 rounded">
                                        Lapor</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection
