<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewPassRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\str;

class MemberController extends Controller
{
    public function index()
    {
        $find  = Peminjaman::where('kode_user', auth()->id())->count();
        return view('users.index', compact('find'));
    }

    public function peminjaman()
    {
        $pinjam = Peminjaman::where([
            'kode_user'             => auth()->id(),
        ])->get();
        $count  = $pinjam->count();
        return view('users.peminjaman.index', compact('count', 'pinjam'));
    }

    public function accept(Request $request)
    {
        $find = Pengembalian::findorfail($request->nota);
        $find->denda = $request->denda;
        $find->tanggal_pengembalian = Carbon::now()->toDateTimeString();
        $find->save();

        return redirect('users/peminjaman/')->with('status', 'Berhasil Mengembalikan Buku. Silahkan tunggu validasi dari admin');
    }

    public function detail($nota)
    {
        $buku   = DetailPeminjaman::where('nota', $nota)->with('buku')->get();
        $member   = Peminjaman::findorfail($nota);
        $count  = $buku->count();
        return view('users.peminjaman.detail', compact('buku', 'count', 'nota', 'member'));
    }

    public function pengembalian()
    {
        $buku  = Pengembalian::whereNotNull('tanggal_pengembalian')->get();
        $count = $buku->count();
        return view('users.pengembalian.index', compact('buku', 'count'));
    }

    public function profile()
    {
        $user = User::findorfail(auth()->id());
        return view('users.profile', compact('user'));
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

        return back()->with('status', 'Berhasil update profil');
    }

    public function updatePassword()
    {
        return view('users.updatepass');
    }

    public function newPassword(NewPassRequest $request)
    {
        $request->validated();

        $user = User::findorfail(auth()->id());

        if (Hash::check($request->oldPass, $user->password)) {
            if (!Hash::check($request->newPass, $user->password)) {
                $user->password = Hash::make($request->newPass);
                $user->save();
                return back()->with('status', 'Berhasil update password!');
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
}
