<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetugasRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PetugasController extends Controller
{
    public function index()
    {
        $get        = User::where('is_admin', 1);
        $petugas    = $get->get();
        $count      = $get->count();
        return view('admin.pages.petugas.index', compact('petugas', 'count'));
    }

    public function create()
    {
        return view('admin.pages.petugas.create');
    }

    public function store(PetugasRequest $request)
    {
        $request->validated();
        User::create([
            'nama'              => $request->nama,
            'email'             => $request->email,
            'alamat'            => $request->alamat,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'no_hp'             => $request->no_hp,
            'foto'              => ($request->jenis_kelamin == "pria" ? "default_male.jpg" : "default_female.jpg"),
            'role'              => $request->role,
            'is_admin'          => 1,
            'username'          => $request->username,
            'password'          => Hash::make($request->password)
        ]);

        return redirect('admin/petugas')->with('status', 'Berhasil tambah petugas');
    }

    public function show($id)
    {
        $petugas = User::findorfail($id);
        return view('admin.pages.petugas.show', compact('petugas'));
    }

    public function nonaktif()
    {
        $petugas = User::onlyTrashed()->where('is_admin', 1)->get();
        $count   = $petugas->count();
        return view('admin.pages.petugas.nonaktif', compact('petugas', 'count'));
    }

    public function restore($id = null)
    {
        $user = ($id != null ? User::onlyTrashed()->where('id', $id) : User::onlyTrashed()->where('is_admin', 1));
        $user->restore();
        if ($id)
            return redirect('admin/petugas/nonaktif')->with('status', 'Berhasil aktifkan petugas');
        else
            return redirect('admin/petugas/nonaktif')->with('status', 'Berhasil aktifkan semua petugas');
    }

    public function deletePermanent($id)
    {
        $user = User::onlyTrashed()->where('id', $id);
        if ($user->foto != 'default_male.jpg' && $user->foto != 'default_female.jpg') {
            Storage::delete('public/assets/foto_user/' . $user->foto);
        }
        $user->forceDelete();
        return redirect('admin/petugas/nonaktif')->with('status', 'Berhasil hapus permanen petugas');
    }

    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return redirect('admin/petugas')->with('status', 'Berhasil nonaktifkan petugas');
    }
}
