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
Route::post('/edit/data', [EditController::class, 'send']);
Route::post('/register/data', [Home::class, 'RegisterData']);
Route::post('/', [Home::class, 'validasi']);

// Route untuk fitur admin
Route::post('/admin/delete/data', [AdminController::class, 'Delete']);
Route::post('/admin/edit/data', [AdminController::class, 'Edit']);
Route::post('/admin/masterdata/delete/{id}', [AdminController::class, 'MasterDataDelete']);
Route::post('/admin/masterdata/input/data', [AdminController::class, 'MasterDataInputData']);

// Route crud profile
Route::post('/profile/newusername', [Profile::class, 'UsernameData']);
Route::post('/profile/newpassword', [Profile::class, 'PasswordData']);
Route::post('/profile/newrole', [Profile::class, 'RoleData']);

// Route untuk views profile
Route::get('/profile/gantiusername', [Profile::class, 'Username']);
Route::get('/profile/gantipassword', [Profile::class, 'Password']);
Route::get('/profile/gantirole', [Profile::class, 'Role']);

// Route action crud
Route::post('/delete/{id}', [DeleteController::class, 'DeleteId']);

// Route untuk views
Route::get('/search', [Home::class, 'Search']);
Route::get('/delete/', [DeleteController::class, 'Delete']);
Route::get('/input', [InputController::class, 'Input']);
Route::get('/edit', [EditController::class, 'Edit']);
Route::get('/profile', [Profile::class, 'Profile']);
Route::get('/dashboard', [Home::class, 'Home']);
Route::get('/semuabarang', [Home::class, 'SemuaBarang']);

// Route untuk views admin
Route::get('/admin/edit', [AdminController::class, 'EditUser']);
Route::get('/admin/delete', [AdminController::class, 'DeleteUser']);
Route::get('/admin/masterdata', [AdminController::class, 'MasterData']);
Route::get('/admin/masterdata/input', [AdminController::class, 'MasterDataInput']);

// Route untuk autentikasi
Route::get('/', [Home::class, 'Login']);
Route::get('/register', [Home::class, 'Register']);
Route::get('/logout', [Home::class, 'Logout']);
