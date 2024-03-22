<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bus;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class AdminSopirController extends Controller
{
    public function index()
    {
        $sopir = User::where('Role', 'sopir')
            ->orWhereRaw('LOWER(Role) = ?', ['sopir'])
            ->get();

        return view('admin.Sopir.Sopir', ['sopir' => $sopir]);
    }

    public function AddSopir()
    {
        $bus = Bus::all();

        return view('admin.Sopir.FormAddSopir', ['bus' => $bus]);
    }

    public function storeSopir(Request $request)
    {

        User::create([
            'ID_Akun' => $request->ID_Sopir,
            'Role' => 'Sopir',
            'Nama' => $request->Nama_Sopir,
            'Alamat' => $request->Alamat,
            'Tanggal_Lahir' => $request->Tanggal_Lahir,
            'No_SIM' => $request->No_SIM,
            'Username' => $request->Username,
            'Password' => Hash::make($request->Password),
            'No_Telepon' => $request->No_Telepon,
            'ID_Bus' => $request->ID_Bus,
            'Kota_Kelahiran' => $request->Kota_Kelahiran,
            'Status' => $request->Status
        ]);

        Alert::success("Berhasil Menambahkan Data Sopir");
        return redirect('admin/sopir');
    }

    public function EditSopir($ID_Akun)
    {
        $sopir = User::findOrFail($ID_Akun);
        $sopir->all();

        $bus = Bus::all();

        return view('admin.Sopir.FormEditSopir', ['sopir' => $sopir, 'bus' => $bus]);
    }

    public function UpdateSopir(Request $request, $ID_Akun)
    {
        $sopir = User::findOrFail($ID_Akun);
        $sopir->Nama = $request->Nama_Sopir;
        $sopir->No_Telepon = $request->No_Telepon;
        $sopir->Alamat = $request->Alamat;
        $sopir->Kota_Kelahiran = $request->Kota_Kelahiran;
        $sopir->Tanggal_Lahir = $request->Tanggal_Lahir;
        $sopir->No_SIM = $request->No_SIM;
        $sopir->Username = $request->Username;
        $sopir->Password = Hash::make($request->Password);
        $sopir->ID_Bus = $request->ID_Bus;
        $sopir->Status = $request->Status;
        $sopir->save();

        Alert::success("Berhasil Update Data Sopir");
        return redirect('admin/sopir');
    }

    public function DeleteSopir($ID_Akun)
    {
        $sopir = User::findOrFail($ID_Akun);
        $sopir->delete();

        Alert::success("Berhasil Delete Data Sopir");
        return redirect('admin/sopir');
    }
}
