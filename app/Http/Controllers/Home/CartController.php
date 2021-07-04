<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\Site;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function wishlist(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ], [
            'id.required'   => 'Buku harus valid'
        ]);

        $find = Buku::findorfail($request->id);
        if ($find->stok < 1) {
            return back()->withErrors('Stok Buku telah habis');
        }
        $cart = array(
            "id"            => $find->id,
            "judul_buku"    => $find->judul_buku,
            'penulis_buku'  => $find->penulis_buku,
            'penerbit_buku' => $find->penerbit_buku,
            'foto_buku'     => $find->foto_buku,
            'qty'           => 1
        );

        if ($request->session()->get('wishlist.items')) {
            foreach ($request->session()->get('wishlist.items') as $keranjang) {
                if ($keranjang['id'] == $find->id) {
                    return back()->withErrors('Buku sudah ada di wishlist');
                }
            }
        }
        $request->session()->push('wishlist.items', $cart);

        return redirect()->route('home')->with('status', 'Berhasil tambah buku ke wishlist');
    }

    public function cart()
    {
        if (!session()->get('cart.items')) {
            return back()->withErrors('Anda harus meminjam buku terlebih dahulu');
        }
        $site  = Site::get()->first();
        $title = "Halaman Keranjang";
        return view('pages.cart', compact('title', 'site'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ], [
            'id.required'   => 'Buku harus valid'
        ]);

        $find = Buku::findorfail($request->id);
        if ($find->stok < 1) {
            return back()->withErrors('Stok Buku telah habis');
        }
        $cart = array(
            "id"            => $find->id,
            "judul_buku"    => $find->judul_buku,
            'penulis_buku'  => $find->penulis_buku,
            'penerbit_buku' => $find->penerbit_buku,
            'foto_buku'     => $find->foto_buku,
            'qty'           => 1
        );

        if ($request->session()->get('cart.items')) {
            foreach ($request->session()->get('cart.items') as $keranjang) {
                if ($keranjang['id'] == $find->id) {
                    return back()->withErrors('Buku sudah ada di keranjang');
                }
            }
        }
        $request->session()->push('cart.items', $cart);

        return redirect()->route('home')->with('status', 'Berhasil tambah buku ke keranjang');
    }

    public function destroy(Request $request)
    {
        $request->session()->forget('cart.items');
        return redirect()->route('home')->with('status', 'Berhasil mengosongkan keranjang');
    }

    public function destroy_wishlist(Request $request)
    {

        $request->session()->forget('wishlist.items');
        return redirect()->route('home')->with('status', 'Berhasil mengosongkan wishlist');
    }

    public function delete(Request $request, $id)
    {
        $find = Buku::findorfail($id);
        $cart = $request->session()->get('cart.items');

        $i = 0;

        foreach ($cart as $keranjang) {
            if ($keranjang['id'] == $find->id) {
                $request->session()->pull('cart.items.' . $i);
                return back()->with('status', 'Berhasil menghapus buku di keranjang');
            }
            $i++;
        }
    }

    private function moreRand($len)
    {
        $str = mt_rand(1, 9);
        for ($i = 0; $i < $len - 1; $i++) {
            $str .= mt_rand(0, 9);
        }
        return $str;
    }

    public function checkout(Request $request)
    {
        $cart = $request->session()->get('cart.items');
        $nota = $this->moreRand(15);

        Peminjaman::create([
            'nota'              => $nota,
            'kode_user'         => auth()->user()->id,
            'kode_petugas'      => NULL,
            'tanggal_pinjam'    => Carbon::now()->toDateTimeString(),
            'tanggal_kembali'   => Carbon::now()->subDays(-7)->toDateTimeString()

        ]);

        foreach ($cart as $keranjang) {
            DetailPeminjaman::create([
                'nota'          => $nota,
                'kode_buku'     => $keranjang['id']
            ]);
        }

        $request->session()->forget('cart.items');
        return redirect()->route('home')->with('status', 'Berhasil. selanjutnya silahkan tunggu persetujuan dari admin');
    }
}
