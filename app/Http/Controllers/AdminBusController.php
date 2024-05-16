<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\User;
use App\Models\Seat;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBusController extends Controller
{
    public function index()
    {
        $bus = Bus::all();
        $sopir = User::join('bus', 'users.id_bus', '=', 'bus.ID_Bus')
            ->select('users.*')
            ->where(function ($query) {
                $query->where('users.Role', 'Sopir')
                    ->orWhere('users.Role', 'sopir');
            })
            ->get();

        $kernet = User::join('bus', 'users.id_bus', '=', 'bus.ID_Bus')
            ->select('users.*')
            ->where(function ($query) {
                $query->where('users.Role', 'Kernet')
                    ->orWhere('users.Role', 'kernet');
            })
            ->get();

        return view('admin.Bus.Bus', [
            'bus' => $bus,
            'sopir' => $sopir,
            'kernet' => $kernet
        ]);
    }

    public function AddBus()
    {
        return view('admin.Bus.FormAddBus');
    }

    public function StoreBus(Request $request)
    {

        Bus::create([
            'ID_Bus' => $request->ID_Bus,
            'Bus_Model' => $request->Bus_Model,
            'Mesin_Bus' => $request->Mesin_Bus,
            'Tahun_Bus' => $request->Tahun_Bus,
            'Jadwal_Service' => $request->Jadwal_Service,
            'Status_Bus' => $request->Status_Bus,
            'Kelas_Bus' => $request->Kelas_Bus,
            'Jumlah_Seat' => $request->Jumlah_Seat,
        ]);






        Alert::success("Berhasil Menambah Data Bus");
        return redirect('/admin/bus');
    }

    public function EditBus($ID_Bus)
    {
        $bus = Bus::findOrFail($ID_Bus);
        $bus->all();

        return view('admin.Bus.FormEditBus', ['bus' => $bus]);
    }

    public function UpdateBus(Request $request, $ID_Bus)
    {
        $bus = Bus::findOrFail($ID_Bus);
        $bus->Bus_Model = $request->Bus_Model;
        $bus->Mesin_Bus = $request->Mesin_Bus;
        $bus->Tahun_Bus = $request->Tahun_Bus;
        $bus->Jadwal_Service = $request->Jadwal_Service;
        $bus->Status_Bus = $request->Status_Bus;
        $bus->Kelas_Bus = $request->Kelas_Bus;
        $bus->Jumlah_Seat = $request->Jumlah_Seat;
        $bus->save();

        Alert::success('Berhasil Update Data Bus');
        return redirect('/admin/bus');
    }

    public function DeleteBus($ID_Bus)
    {
        $bus = Bus::findOrFail($ID_Bus);
        $bus->delete();

        Alert::success('Berhasil Menghapus Data Bus');
        return redirect('/admin/bus');
    }

    public function Search(Request $request)
    {

        if ($request->has('search')) {
            $bus = Bus::where('ID_Bus', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $bus = Bus::all();
        }
        $sopir = User::join('bus', 'users.id_bus', '=', 'bus.ID_Bus')
            ->select('users.*')
            ->where(function ($query) {
                $query->where('users.Role', 'Sopir')
                    ->orWhere('users.Role', 'sopir');
            })
            ->get();

        $kernet = User::join('bus', 'users.id_bus', '=', 'bus.ID_Bus')
            ->select('users.*')
            ->where(function ($query) {
                $query->where('users.Role', 'Kernet')
                    ->orWhere('users.Role', 'kernet');
            })
            ->get();

        return view('admin.Bus.Bus', [
            'bus' => $bus,
            'sopir' => $sopir,
            'kernet' => $kernet
        ]);
    }

    public function seat()
    {
    }
}
