<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRegister extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'id_petugas' => [''],
            'type' => [''],
            'nama' => ['required', 'string', 'max:35'],
            'username' => ['required', 'string', 'max:25', 'unique:users'],
            'telp' => ['string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'max:32']
        ]);
        User::create([
            'id_petugas' => $request['id_petugas'],
            'type' => $request['type'],
            'nama' => $request['nama'],
            'username' => $request['username'],
            'telp' => $request['telp'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect(route('admin.tambah'))->with('message', 'Akun Petugas Behasil di Tambahkan!');
    }

    public function hapusPetugas($id)
    {
        User::where('id', $id)
            ->delete();


        return redirect(route('admin.tambah'))->with('message', 'Petugas Berhasil di Hapus!');
    }
}
