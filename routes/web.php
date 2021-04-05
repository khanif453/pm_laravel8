<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('auth.login');
});
*/

Route::get('/', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');

Auth::routes();

Route::name('admin.')->namespace('Admin')->group(function () {
    Route::prefix('/petugas')->namespace('Auth')->middleware('guest')->group(function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
        Route::post('/logout', 'LoginController@logout')->name('logout');

        Route::get('/registerAdminForm', 'RegisterController@showRegisterForm')->name('registerAdmin');
        Route::post('/registerAdmin', 'RegisterController@register')->name('postregister');
    });

    Route::prefix('/admin')->middleware('auth.petugas', 'admin')->group(function () {
        Route::get('/', 'HomeController@index');
        Route::get('/dashboard', 'HomeController@index')->name('home');

        Route::get('/admin', 'UsersController@index')->name('users.index');
        Route::get('/petugas', 'UsersController@indexPetugas')->name('users.indexPetugas');
        Route::get('/masyarakat', 'UsersController@indexMasyarakat')->name('users.indexMasyarakat');

        // Laporan
        Route::get('/laporan', 'LaporanController@indexLaporan')->name('laporan.index');
        Route::get('/laporan/admin', 'LaporanController@printAdmin')->name('laporan.laporanAdmin');
        Route::get('/laporan/petugas', 'LaporanController@printPetugas')->name('laporan.laporanPetugas');
        Route::get('/laporan/masyarakat', 'LaporanController@printMasyarakat')->name('laporan.laporanMasyarakat');
        Route::get('/laporan/pengaduan', 'LaporanController@printPengaduan')->name('laporan.laporanPengaduan');

        Route::resource('/petugas', 'PetugasController', ['except' => ['index', 'show']]);
        Route::put('/petugas/{id_petugas}/status', 'PetugasController@updateStatus')->name('petugas.status.update');
        Route::get('/petugas/createPetugas', 'PetugasController@createPetugas')->name('petugas.createPetugas');
        Route::post('/petugas/createPetugas/store', 'PetugasController@storePetugas')->name('petugas.storePetugas');

        Route::resource('/masyarakat', 'MasyarakatController', ['except' => ['index', 'show']]);
    });
});

Route::prefix('/admin')->name('admin.')->middleware('auth.petugas', 'admin')->group(function () {
    Route::resource('/pengaduan', 'Masyarakat\PengaduhanController', ['except' => ['edit', 'update']]);
    Route::post('/pengaduan/tanggapan/store/{pengaduan}', 'Admin\TanggapanController@store', ['except' => ['show', 'create', 'edit', 'update']])->name('pengaduan.tanggapan.store');

    Route::resource('/tanggapan', 'Admin\TanggapanController', ['except' => ['show', 'create', 'edit', 'update']]);
});

Route::prefix('/petugas')->name('petugas.')->middleware('auth.petugas', 'petugas')->group(function () {
    Route::resource('/pengaduan', 'Masyarakat\PengaduhanController', ['except' => ['edit', 'update']]);
    Route::post('/pengaduan/tanggapan/store/{pengaduan}', 'Admin\TanggapanController@store', ['except' => ['show', 'create', 'edit', 'update']])->name('pengaduan.tanggapan.store');

    Route::resource('/tanggapan', 'Admin\TanggapanController', ['except' => ['show', 'create', 'edit', 'update']]);

    Route::get('/', 'Petugas\HomeController@index');
    Route::get('/dashboard', 'Petugas\HomeController@index')->name('home');
});

Route::prefix('/masyarakat')->name('masyarakat.')->namespace('Masyarakat')->group(function () {
    Route::namespace('Auth')->middleware('guest')->group(function () {
        Route::get('/registerMasyarakatForm', 'RegisterController@showRegisterForm')->name('registerMasyarakat');
        Route::post('/register', 'RegisterController@register')->name('postregister');
    });

    Route::middleware('auth.masyarakat')->group(function () {
        Route::get('/', 'HomeController@index');
        Route::get('/dashboard', 'HomeController@index')->name('home');
        Route::resource('/pengaduan', 'PengaduhanController', ['except' => ['edit', 'update']]);
    });
});
