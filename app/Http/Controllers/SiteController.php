<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteRequest;
use App\Models\Site;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function index()
    {
        $site = Site::get()->first();
        return view('admin.pages.profil.site', compact('site'));
    }

    public function update(SiteRequest $request)
    {
        $request->validated();

        $site = Site::findorfail($request->id);
        $site->nama         = $request->nama;
        $site->email        = $request->email;
        $site->no_telp      = $request->no_telp;
        if ($request->hasFile('foto')) {
            Storage::delete('public/assets/' . $site->foto);
            $foto = $request->file('foto');
            $filename = $foto->getClientOriginalName();
            $filename = Str::random(16) . $filename;
            $foto->storeAs('public/assets/', $filename);
            $site->foto = $filename;
            $request->session()->put('foto', $site->foto);
        }
        $site->save();

        $request->session()->put('siteProfile', $site);

        return redirect('admin/siteProfile')->with('status', 'Berhasil update profil website');
    }
}
