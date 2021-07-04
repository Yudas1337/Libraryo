<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Site;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $baru  = Buku::orderBy('id', 'desc')->limit(3)->get();
        $buku  = Buku::where('stok', '>', 0)->get();
        $title = "HomePage Libraryo";
        $site  = Site::get()->first();

        return view('pages.index', compact('title', 'site', 'buku', 'baru'));
    }
}
