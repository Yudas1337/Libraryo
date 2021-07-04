<?php

namespace App\Http\Controllers;

use App\Http\Requests\RakRequest;
use App\Models\Rak;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rak    = Rak::all();
        $count  = Rak::count();
        return view('admin.pages.rak.index', compact('rak', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.rak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RakRequest $request)
    {
        $request->validated();

        Rak::create([
            'nama_rak'      => $request->nama_rak,
            'lokasi_rak'    => $request->lokasi_rak
        ]);

        return redirect('admin/rak')->with('status', 'Berhasil tambah rak buku');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Rak::findorfail($id);
        return view('admin.pages.rak.edit', compact('id', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RakRequest $request, $id)
    {
        $request->validated();
        $rak = Rak::findorfail($id);
        $rak->nama_rak      = $request->nama_rak;
        $rak->lokasi_rak    = $request->lokasi_rak;
        $rak->save();

        return redirect('admin/rak')->with('status', 'Berhasil update rak buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rak = Rak::findorfail($id);
        $rak->delete();

        return redirect('admin/rak')->with('status', 'Berhasil hapus rak buku');
    }
}
