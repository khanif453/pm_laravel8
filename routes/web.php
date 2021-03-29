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

        Route::resource('/petugas', 'PetugasController', ['except' => ['index', 'show']]);
        Route::put('/petugas/{id}/status', 'PetugasController@updateStatus')->name('petugas.status.update');
        Route::get('/petugas/createPetugas', 'PetugasController@createPetugas')->name('petugas.createPetugas');
        Route::post('/petugas/createPetugas/store', 'PetugasController@storePetugas')->name('petugas.storePetugas');

        Route::resource('/masyarakat', 'MasyarakatController', ['except' => ['index', 'show']]);

        Route::get('/laporan', 'LaporanController@index')->name('laporan');
        Route::get('/laporan/users/excel', 'LaporanController@usersExcel')->name('laporan.users.excel');
        Route::get('/laporan/users/admin/excel', 'LaporanController@usersAdminExcel')->name('laporan.users.admin.excel');
        Route::get('/laporan/users/petugas/excel', 'LaporanController@usersPetugasExcel')->name('laporan.users.petugas.excel');
        Route::get('/laporan/users/masyarakat/excel', 'LaporanController@usersMasyarakatExcel')->name('laporan.users.masyarakat.excel');

        Route::get('/laporan/pengaduan/excel', 'LaporanController@pengaduanExcel')->name('laporan.pengaduan.excel');
        Route::get('/laporan/tanggapan/excel', 'LaporanController@tanggapanExcel')->name('laporan.tanggapan.excel');

        Route::get('/laporan/users/pdf', 'LaporanController@usersPDF')->name('laporan.users.pdf');
        Route::get('/laporan/users/admin/pdf', 'LaporanController@usersAdminPDF')->name('laporan.users.admin.pdf');
        Route::get('/laporan/users/petugas/pdf', 'LaporanController@usersPetugasPDF')->name('laporan.users.petugas.pdf');
        Route::get('/laporan/users/masyarakat/pdf', 'LaporanController@usersMasyarakatPDF')->name('laporan.users.masyarakat.pdf');

        Route::get('/laporan/pengaduan/pdf', 'LaporanController@pengaduanPDF')->name('laporan.pengaduan.pdf');
        Route::get('/laporan/tanggapan/pdf', 'LaporanController@tanggapanPDF')->name('laporan.tanggapan.pdf');
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
