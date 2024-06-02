<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bus;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminKernetController extends Controller
{
    public function index()
    {
        $kernet = User::where('Role', 'kernet')
            ->orWhereRaw('LOWER(Role) = ?', ['kernet'])
            ->get();

        return view('admin.Kernet.Kernet', ['kernet' => $kernet]);
    }

    public function AddKernet()
    {
        $bus = Bus::all();

        return view('admin.Kernet.FormAddKernet', ['bus' => $bus]);
    }

    public function StoreKernet(Request $request)
    {
        User::create([
            'ID_Akun' => $request->ID_Kernet,
            'Role' => 'kernet',
            'Nama' => $request->Nama_Kernet,
            'Alamat' => $request->Alamat,
            'Tanggal_Lahir' => $request->Tanggal_Lahir,
            'Username' => $request->Username,
            'Password' => Hash::make($request->Password),
            'No_Telepon' => $request->No_Telepon,
            'ID_Bus' => $request->ID_Bus,
            'Kota_Kelahiran' => $request->Kota_Kelahiran,
            'Status' => $request->Status
        ]);

        Alert::success("Berhasil Menambahkan Data kernet");
        return redirect('admin/kernet');
    }

    public function EditKernet($ID_Akun)
    {
        $kernet = User::findOrFail($ID_Akun);
        $kernet->all();

        $bus = Bus::all();

        return view('admin.Kernet.FormEditKernet', ['kernet' => $kernet, 'bus' => $bus]);
    }

    public function UpdateKernet(Request $request, $ID_Akun)
    {
        $kernet = User::findOrFail($ID_Akun);
        $kernet->Nama = $request->Nama_Kernet;
        $kernet->No_Telepon = $request->No_Telepon;
        $kernet->Alamat = $request->Alamat;
        $kernet->Kota_Kelahiran = $request->Kota_Kelahiran;
        $kernet->Tanggal_Lahir = $request->Tanggal_Lahir;
        $kernet->No_SIM = $request->No_SIM;
        $kernet->Username = $request->Username;
        $kernet->Password = Hash::make($request->Password);
        $kernet->ID_Bus = $request->ID_Bus;
        $kernet->Status = $request->Status;
        $kernet->save();

        Alert::success("Berhasil Update Data kernet");
        return redirect('admin/kernet');
    }

    public function Deletekernet($ID_Akun)
    {
        $kernet = User::findOrFail($ID_Akun);
        $kernet->delete();

        Alert::success("Berhasil Delete Data kernet");
        return redirect('admin/kernet');
    }

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $kernet = User::where('Nama', 'LIKE', '%' . $request->search . '%')
                ->where('Role', 'LIKE', '%' . 'kernet' . '%')
                ->orWhere('ID_Akun', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $kernet = User::where('Role', 'kernet')
                ->orWhereRaw('LOWER(Role) = ?', ['kernet'])
                ->get();
        }
        return view('admin.Kernet.Kernet', ['kernet' => $kernet]);
    }
}
