<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\laravel_example\UserManagement;
use App\Http\Controllers\PaketController;

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

$controller_path = 'App\Http\Controllers';
//generate password
Route::get('/password/{password}', function ($password) {
    return bcrypt($password);
});
// Main Page Route
Route::get('/', [Controller::class, 'index'])->name('welcome');
Route::get('cari-paket/{category}/{schedule}/{departure}/{order}', [PaketController::class, 'search'])->name('cari-paket');
Route::get('ajax-paket/{category}/{schedule}/{departure}/{order}', [PaketController::class, 'ajax'])->name('ajax-paket');
Route::get('/paket/{slug}', [PaketController::class, 'paket'])->name('paket');
Route::get('get-kota', [PaketController::class, 'get_kota'])->name('get-kota');
Route::get('buat-pesanan', [PaketController::class, 'buat_pesanan'])->name('buat-pesanan');
//1
Route::get('buat-pembayaran/{id}', [PaketController::class, 'select_pay'])->name('buat-pembayaran');
//2
Route::get('post-pembayaran/{id}/{type}/{direct}', [PaketController::class, 'post_pay'])->name('post-pembayaran');
//3;
Route::get('update/{id}/{status}', [PaketController::class, 'update'])->name('update-payment');
//4
Route::get('/midtrans/notification', [PaketController::class, 'handleNotification']);
//wd
Route::get('/minta-dana', [PaketController::class, 'minta_dana'])->name('minta-dana');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register-agent', [AuthController::class, 'register_agent'])->name('register-agent');

//buat untuk halaman pages yang nantinya pakai slug
Route::get('/pages/{slug}', [Controller::class, 'pages'])->name('pages');
Route::get('/news/{slug}', [Controller::class, 'news'])->name('news');
Route::get('/categories/{slug}', [Controller::class, 'categories'])->name('categories');
