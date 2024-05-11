<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {

        // Simpan URL saat ini sebelum mengubah kata sandi
        session(['previous_url' => url()->previous()]);
        return view("UbahPassword");
    }
    public function changePassword(Request $request)
    {
        // Cek password lama
        if (!Hash::check($request->oldPassword, auth()->user()->Password)) {
            return view("UbahPassword")->with('error', 'Password lama salah'); // Kembalikan pengguna ke halaman sebelumnya
        }

        if ($request->newPassword != $request->repeatPassword) {
            return view("UbahPassword")->with('error', 'Password baru yang dimasukan tidak sama');
        } else {
            auth()->user()->update([
                'Password' => Hash::make($request->newPassword)
            ]);

            // Dapatkan URL sebelumnya dari session
            $previousUrl = session('previous_url', '/');

            // Ambil hanya path dari URL sebelumnya
            $parsedUrl = parse_url($previousUrl);
            $previousPath = isset($parsedUrl['path']) ? $parsedUrl['path'] : '/';

            // Mendapatkan URL menggunakan route
            Alert::success('Success', 'Berhasil ganti password');
            // toast('Your Post as been submited!','success');
            return redirect($previousPath)->with('success', 'Berhasil mengubah password');
        }
    }
}
