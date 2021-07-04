<?php

namespace App\Http\Controllers;

use App\Http\Requests\BukuRequest;
use App\Models\Buku;
use App\Models\Rak;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count  = Buku::count();
        $buku   = Buku::all();
        return view('admin.pages.buku.index', compact('count', 'buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rak = Rak::all();
        return view('admin.pages.buku.create', compact('rak'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuRequest $request)
    {
        $request->validated();

        if (!$request->hasFile('foto_buku')) {
            $request->validate(['foto_buku' => 'required'], ['foto_buku.required' => 'Foto Buku harus ada']);
        }

        $foto = $request->file('foto_buku');
        $filename = $foto->getClientOriginalName();
        $filename = Str::random(16) . $filename;
        $foto->storeAs('public/assets/foto_buku/', $filename);

        Buku::create([
            'judul_buku'        => $request->judul_buku,
            'penulis_buku'      => $request->penulis_buku,
            'penerbit_buku'     => $request->penerbit_buku,
            'foto_buku'         => $filename,
            'tahun_penerbit'    => $request->tahun_penerbit,
            'stok'              => $request->stok,
            'id_rak'            => $request->id_rak
        ]);

        return redirect('admin/buku')->with('status', 'Berhasil tambah buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = Buku::findorfail($id);

        return view('admin.pages.buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::findorfail($id);
        $rak = Rak::all();

        return view('admin.pages.buku.edit', compact('buku', 'id', 'rak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BukuRequest $request, $id)
    {
        $request->validated();
        $buku = Buku::findorfail($id);
        $buku->judul_buku       = $request->judul_buku;
        $buku->penulis_buku     = $request->penulis_buku;
        $buku->penerbit_buku    = $request->penerbit_buku;
        $buku->tahun_penerbit   = $request->tahun_penerbit;
        $buku->stok             = $request->stok;
        $buku->id_rak           = $request->id_rak;

        if ($request->hasFile('foto_buku')) {
            Storage::delete('public/assets/foto_buku/' . $buku->foto_buku);
            $foto = $request->file('foto_buku');
            $filename = $foto->getClientOriginalName();
            $filename = Str::random(16) . $filename;
            $foto->storeAs('public/assets/foto_buku/', $filename);
            $buku->foto_buku = $filename;
        }

        $buku->save();
        return redirect('admin/buku')->with('status', 'Berhasil update buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::findorfail($id);
        Storage::delete('public/assets/foto_buku/' . $buku->foto_buku);
        $buku->delete();
        return redirect('admin/buku')->with('status', 'Berhasil hapus buku');
    }
}
