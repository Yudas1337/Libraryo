<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (auth()->user()->is_admin == 1) {
                return redirect()->intended('admin');
            } else {
                return redirect()->intended('users');
            }
        } else {
            $title = "Halaman Register";
            $site  = Site::get()->first();
            return view('auth.register', compact('title', 'site'));
        }
    }

    public function register(RegisterRequest $request)
    {
        $request->validated();

        User::create([
            'nama'              => $request->nama,
            'email'             => $request->email,
            'alamat'            => $request->alamat,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'no_hp'             => $request->no_hp,
            'foto'              => ($request->jenis_kelamin == "pria" ? "default_male.jpg" : "default_female.jpg"),
            'role'              => "member",
            'is_admin'          => 0,
            'username'          => $request->username,
            'password'          => Hash::make($request->password)
        ]);

        return redirect('login')->with('status', 'Berhasil register');
    }
}
