<?php

namespace App\Http\Controllers;

use App\Models\DetailPeminjaman;
use App\Models\DetailPengembalian;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validasi()
    {
        $pengembalian = Pengembalian::whereNotNull('tanggal_pengembalian')->whereNull('keterangan')->get();
        $count        = $pengembalian->count();
        return view('admin.pages.pengembalian.validasi', compact('pengembalian', 'count'));
    }

    public function index()
    {
        $pengembalian = Pengembalian::whereNull('tanggal_pengembalian')->get();
        $count        = $pengembalian->count();
        return view('admin.pages.pengembalian.index', compact('pengembalian', 'count'));
    }

    public function detailPengembalian($nota)
    {
        $pengembalian = Pengembalian::findorfail($nota);
        return view('admin.pages.pengembalian.detail', compact('pengembalian'));
    }

    public function validasiPengembalian(Request $request)
    {
        $find =  Pengembalian::findorfail($request->nota);
        $find->keterangan = $request->keterangan;

        $find->save();

        $ambil = DetailPeminjaman::where('nota', $request->nota)->get();

        foreach ($ambil as $a) {
            DetailPengembalian::create([
                'nota'          => $request->nota,
                'kode_buku'     => $a->kode_buku
            ]);
        }

        return redirect('admin/pengembalian')->with('status', 'Berhasil validasi pengembalian');
    }

    public function history()
    {
        $pengembalian = Pengembalian::whereNotNull('keterangan')->get();
        $count  = $pengembalian->count();
        return view('admin.pages.pengembalian.history', compact('pengembalian', 'count'));
    }
}
