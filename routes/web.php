<?php

use Illuminate\Support\Facades\Route;

// General
use App\Http\Controllers\Profile;
use App\Http\Controllers\Home;
use App\Http\Controllers\InputController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\EditController;

// Admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SumberAset;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\KelompokAsetController;

// Api
use App\Http\Controllers\Api;

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

// Route untuk crud data
Route::post('/input/data', [InputController::class, 'Send']);
Route::post('/delete/data', [DeleteController::class, 'send']);
Route::post('/edit/data/{id}', [EditController::class, 'send']);
Route::post('/register/data', [Home::class, 'RegisterData']);
Route::post('/validasi', [Home::class, 'validasi']);

Route::get('/', function(){
    return view('HomePage');
});

// Route untuk fitur admin
Route::post('/admin/delete/data', [AdminController::class, 'Delete']);
Route::post('/admin/edit/data', [AdminController::class, 'Edit']);


//Route::post('/admin/masterdata/delete/{id}', [AdminController::class, 'MasterDataDelete']);
//Route::post('/admin/masterdata/input/data', [AdminController::class, 'MasterDataInputData']);

// Route crud profile
Route::post('/profile/newusername', [Profile::class, 'UsernameData']);
Route::post('/profile/newpassword', [Profile::class, 'PasswordData']);
Route::post('/profile/newrole', [Profile::class, 'RoleData']);

// Route untuk views profile
Route::get('/profile/gantiusername', [Profile::class, 'Username']);
Route::get('/profile/gantipassword', [Profile::class, 'Password']);
Route::get('/profile/gantirole', [Profile::class, 'Role']);

// Master Data ( Sumber Dana )
Route::get('/admin/sumberdana', [SumberAset::class, 'Index']);
Route::get('/admin/sumberdana/input',[SumberAset::class, 'SumberDanaInput']);
Route::post('/admin/sumberdana/delete/{id}', [SumberAset::class, 'SumberDanaDelete']);
Route::post('/admin/sumberdana/input/data', [SumberAset::class, 'SumberDanaInputData']);

// Master Data ( Ruangan )
Route::get('/admin/ruangan', [RuanganController::class, 'Index']);
Route::get('/admin/ruangan/input', [RuanganController::class, 'Input']);
Route::post('/admin/ruangan/input/data', [RuanganController::class, 'Kirim']);
Route::post('/admin/ruangan/delete/{id}', [RuanganController::class, 'Delete']);

// Master Data ( Pengelola Aset )
Route::get('/admin/pengelola', [PengelolaController::class, 'Index']);
Route::get('/admin/pengelola/input', [PengelolaController::class, 'Input']);
Route::post('/admin/pengelola/input/data', [PengelolaController::class, 'Kirim']);
Route::post('/admin/pengelola/delete/{id}', [PengelolaController::class, 'Delete']);

// Master Data ( Kelompok Aset )
Route::get('/admin/kelompokaset', [KelompokAsetController::class, 'Index']);
Route::get('/admin/kelompokaset/input', [KelompokAsetController::class, 'Input']);
Route::post('/admin/kelompokaset/input/data', [KelompokAsetController::class, 'Kirim']);
Route::post('/admin/kelompokaset/delete/{id}', [KelompokAsetController::class, 'Delete']);

// Route action crud
Route::post('/delete/{id}', [DeleteController::class, 'DeleteId']);

// Route untuk views
Route::get('/search', [Home::class, 'Search']);
Route::get('/input', [InputController::class, 'Input']);
Route::get('/edit/{id}', [EditController::class, 'Edit']);
Route::get('/profile', [Profile::class, 'Profile']);
Route::get('/dashboard', [Home::class, 'Home']);
Route::get('/semuabarang', [Home::class, 'SemuaBarang']);

// Excel
Route::get('/semuabarang/excel', [Home::class, 'DownloadExcel']);
Route::get('/semuabarang/import', function(){
    return view('ImportExcel');
});
Route::post('/semuabarang/import/data', [Home::class, 'AmbilFile']);

// Route untuk views admin
Route::get('/admin/edit', [AdminController::class, 'EditUser']);
Route::get('/admin/delete', [AdminController::class, 'DeleteUser']);
Route::get('/admin/user', [AdminController::class, 'User']);

// Api
Route::get('/api/totaldana/{id}', [Api::class, 'Total_Dana']);
Route::get('/api/datapengelola', [Api::class, 'Data_Pengelola']);
Route::get('/api/datapengelola/total', [Api::class, 'Total_Pengelola']);

// Route untuk autentikasi
Route::get('/admin', [Home::class, 'Login']);
Route::get('/register', [Home::class, 'Register']);
Route::get('/logout', [Home::class, 'Logout']);

Route::get('/config-clear', function() {
    $status = Artisan::call('config:clear');
    return '<h1>Configurations cleared</h1>';
});

Route::get('/cache-clear', function() {
    $status = Artisan::call('cache:clear');
    return '<h1>Cache cleared</h1>';
});

Route::get('/config-cache', function() {
    $status = Artisan::call('config:Cache');
    return '<h1>Configurations cache cleared</h1>';
});
