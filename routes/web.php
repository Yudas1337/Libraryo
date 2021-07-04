<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Member\MemberController as UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('login', [LoginController::class, 'index']);
    Route::post('login', [LoginController::class, 'authenticate'])->name('login');
    Route::get('register', [RegisterController::class, 'index']);
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::post('cart', [CartController::class, 'add'])->name('cart');
    Route::get('cart', [CartController::class, 'cart']);
    Route::post('wishlist', [CartController::class, 'wishlist'])->name('wishlist');
    Route::post('cart/{id}', [CartController::class, 'delete'])->name('delete');
    Route::post('destroy', [CartController::class, 'destroy'])->name('destroy');
    Route::post('destroy_wishlist', [CartController::class, 'destroy_wishlist'])->name('destroy_wishlist');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', [DashboardController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'is_admin:member'], function () {
        Route::post('checkout', [CartController::class, 'checkout'])->name('checkout');
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::prefix('peminjaman')->group(function () {
                Route::get('/', [UserController::class, 'peminjaman']);
                Route::get('detailPinjam/{nota}', [UserController::class, 'detail']);
                Route::post('accept', [UserController::class, 'accept'])->name('kembalikan');
            });
            Route::prefix('pengembalian')->group(function () {
                Route::get('/', [UserController::class, 'pengembalian']);
            });
            Route::get('updatePassword', [UserController::class, 'updatePassword']);
            Route::post('updatePassword', [UserController::class, 'newPassword']);
            Route::get('profile', [UserController::class, 'profile']);
            Route::post('profile', [UserController::class, 'updateProfile']);
        });
    });



    Route::prefix('admin')->group(function () {
        Route::group(['middleware' => 'is_admin:admin,petugas'], function () {
            Route::prefix('peminjaman')->group(function () {
                Route::get('/', [PeminjamanController::class, 'index']);
                Route::get('history', [PeminjamanController::class, 'history']);
                Route::get('detailPinjam/{nota}', [PeminjamanController::class, 'detailPinjam']);
                Route::get('accept/{nota}', [PeminjamanController::class, 'accept'])->name('accept');
            });
            Route::prefix('pengembalian')->group(function () {
                Route::get('validasi', [PengembalianController::class, 'validasi']);
                Route::post('validasi', [PengembalianController::class, 'validasiPengembalian'])->name('pengembalian');
                Route::get('/', [PengembalianController::class, 'index']);
                Route::get('history', [PengembalianController::class, 'history']);
                Route::get('detailpengembalian/{nota}', [PengembalianController::class, 'detailPengembalian']);
            });
            Route::get('updatePassword', [DashboardController::class, 'updatePassword']);
            Route::post('updatePassword', [DashboardController::class, 'newPassword']);
            Route::get('profile', [DashboardController::class, 'profile']);
            Route::post('profile', [DashboardController::class, 'updateProfile']);
            Route::get('/', [DashboardController::class, 'index']);
        });
        Route::group(['middleware' => 'is_admin:admin'], function () {
            Route::prefix('member')->group(function () {
                Route::get('nonaktif', [MemberController::class, 'nonaktif']);
                Route::delete('deletePermanent/{id}', [MemberController::class, 'deletePermanent']);
                Route::get('restore/', [MemberController::class, 'restore']);
                Route::get('restore/{id}', [MemberController::class, 'restore']);
            });
            Route::prefix('petugas')->group(function () {
                Route::get('nonaktif', [PetugasController::class, 'nonaktif']);
                Route::delete('deletePermanent/{id}', [PetugasController::class, 'deletePermanent']);
                Route::get('restore/', [PetugasController::class, 'restore']);
                Route::get('restore/{id}', [PetugasController::class, 'restore']);
            });
            Route::resources([
                'rak'       => RakController::class,
                'buku'      => BukuController::class,
                'member'    => MemberController::class,
                'petugas'   => PetugasController::class
            ]);
            Route::get('siteProfile', [SiteController::class, 'index']);
            Route::post('siteProfile', [SiteController::class, 'update']);
        });
    });
});
