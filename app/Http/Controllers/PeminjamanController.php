<?php

namespace App\Http\Controllers;

use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjam = Peminjaman::whereNull('kode_petugas')->get();
        $count  = $pinjam->count();
        return view('admin.pages.peminjaman.index', compact('pinjam', 'count'));
    }

    public function history()
    {
        $pinjam = Peminjaman::whereNotNull('kode_petugas')->get();
        $count  = $pinjam->count();
        return view('admin.pages.peminjaman.history', compact('pinjam', 'count'));
    }

    public function detailPinjam($nota)
    {
        $buku   = DetailPeminjaman::where('nota', $nota)->with('buku')->get();
        $member   = Peminjaman::findorfail($nota);
        $count  = $buku->count();
        return view('admin.pages.peminjaman.detail', compact('buku', 'count', 'nota', 'member'));
    }

    public function accept($nota)
    {
        $pinjam = Peminjaman::findorfail($nota);

        if ($pinjam->kode_petugas != NULL) {
            return back()->withErrors('Transaksi ini sudah divalidasi');
        }
        $pinjam->kode_petugas = auth()->user()->id;
        $pinjam->save();

        Pengembalian::create([
            'nota'                  => $nota,
            'kode_user'             => $pinjam->user->first()->id,
            'kode_petugas'          => auth()->user()->id,
            'denda'                 => NULL,
            'tanggal_pengembalian'  => NULL,
            'keterangan'            => NULL
        ]);

        return redirect('admin/peminjaman')->with('status', 'Berhasil validasi Peminjaman');
    }
}
