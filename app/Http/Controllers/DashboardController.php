<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPassRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Rak;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $user           = User::all()->count();
        $petugas        = User::where('is_admin', 1)->count();
        $pnonaktif      = User::onlyTrashed()->where('is_admin', 1)->count();
        $member         = User::where('is_admin', 0)->count();
        $mnonaktif      = User::onlyTrashed()->where('is_admin', 0)->count();
        $unonaktif      = User::onlyTrashed()->count();
        $buku           = Buku::all()->count();
        $rak            = Rak::all()->count();
        $pengembalian   = Pengembalian::all()->count();
        $peminjaman     = Peminjaman::all()->count();

        return view('admin.pages.index', compact('user', 'petugas', 'member', 'buku', 'rak', 'pengembalian', 'peminjaman', 'pnonaktif', 'mnonaktif', 'unonaktif'));
    }


    public function updatePassword()
    {
        return view('admin.pages.updatepass');
    }

    public function newPassword(NewPassRequest $request)
    {
        $request->validated();

        $user = User::findorfail(auth()->id());

        if (Hash::check($request->oldPass, $user->password)) {
            if (!Hash::check($request->newPass, $user->password)) {
                $user->password = Hash::make($request->newPass);
                $user->save();
                return redirect('admin/updatePassword')->with('status', 'Berhasil update password!');
            } else {
                return back()->withErrors([
                    'Password baru tidak boleh sama dengan password lama'
                ]);
            }
        } else {
            return back()->withErrors([
                'Password lama tidak cocok'
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('status', 'Berhasil Logout');
    }

    public function profile()
    {
        $user = User::findorfail(auth()->id());

        return view('admin.pages.profil.profile', compact('user'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $request->validated();
        $user = User::findorfail(auth()->id());
        $cek = User::where('email', $request->email)->count();
        if ($user->email != $request->email && $cek > 0) {
            return back()->withErrors([
                'Email telah digunakan',
            ]);
        }
        $user->nama             = $request->nama;
        $user->alamat           = $request->alamat;
        $user->email            = $request->email;
        $user->no_hp            = $request->no_hp;
        $user->jenis_kelamin    = $request->jenis_kelamin;
        if ($request->hasFile('foto')) {
            if ($user->foto != "default_male.jpg" && $user->foto != "default_female.jpg") {
                Storage::delete('public/assets/foto_user/' . $user->foto);
            }
            $foto = $request->file('foto');
            $filename = $foto->getClientOriginalName();
            $filename = Str::random(16) . $filename;
            $foto->storeAs('public/assets/foto_user/', $filename);
            $user->foto = $filename;
        }

        $user->save();

        return redirect('admin/profile')->with('status', 'Berhasil update profil');
    }
}
