<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Site;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Where to redirect admins after login.
     *
     * @var string
     */
    protected $remember = false;


    public function authenticate(LoginRequest $request)
    {
        if ($request->remember_me) $this->remember = true;
        $credentials = $request->validated();
        if (Auth::attempt($credentials, $this->remember)) {
            $site = Site::get()->first();
            $request->session()->put('siteProfile', $site);
            $request->session()->regenerate();
            if (auth()->user()->is_admin == 1) {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->withErrors([
            'error' => 'Username atau Password tidak cocok',
        ]);
    }

    public function index()
    {
        $site = Site::get()->first();
        if (Auth::check()) {
            if (auth()->user()->is_admin == 1) {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/');
            }
        } else {
            return view('auth.login', compact('site'));
        }
    }
}
