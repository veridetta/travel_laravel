<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\laravel_example\UserManagement;


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

// Main Page Route
Route::get('/', [Controller::class, 'index'])->name('welcome');
//buat untuk halaman pages yang nantinya pakai slug
Route::get('/pages/{slug}', [Controller::class, 'pages'])->name('pages');
Route::get('/news/{slug}', [Controller::class, 'news'])->name('news');
Route::get('/categories/{slug}', [Controller::class, 'categories'])->name('categories');
