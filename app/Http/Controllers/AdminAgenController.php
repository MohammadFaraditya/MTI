<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class AdminAgenController extends Controller
{
    public function index()
    {
        $agen = User::where('Role', 'agen')
            ->orWhereRaw('LOWER(Role) = ?', ['agen'])
            ->get();

        return view('admin.Agen.Agen', ['agen' => $agen]);
    }

    public function AddAgen()
    {
        return view('admin.Agen.FormAddAgen');
    }

    public function StoreAgen(Request $request)
    {
        User::create([
            'ID_Akun' => $request->ID_Agen,
            'Role' => 'Agen',
            'Nama' => $request->Nama_Agen,
            'No_Telepon' => $request->No_Telepon,
            'Alamat' => $request->Alamat,
            'Username' => $request->Username,
            'Password' => Hash::make($request->Password),
            'Status' => $request->Status
        ]);

        Alert::success("Berhasil Menambahkan Akun Agen");
        return redirect('admin/agen');
    }

    public function EditAgen($ID_Akun)
    {
        $agen = User::findOrFail($ID_Akun);
        $agen->all();

        return view('admin.Agen.FormEditAgen', ['agen' => $agen]);
    }

    public function UpdateAgen(Request $request, $ID_Akun)
    {
        $agen = User::findOrFail($ID_Akun);
        $agen->Nama = $request->Nama_Agen;
        $agen->No_Telepon = $request->No_Telepon;
        $agen->Alamat = $request->Alamat;
        $agen->Username = $request->Username;
        $agen->Password = Hash::make($request->Password);
        $agen->Status = $request->Status;
        $agen->save();

        Alert::success("Berhasil Update Data");
        return redirect('admin/agen');
    }

    public function DeleteAgen($ID_Akun)
    {
        $agen = User::findOrFail($ID_Akun);
        $agen->delete();

        Alert::success("Berhasil Delete Data kernet");
        return redirect('admin/agen');
    }
}
