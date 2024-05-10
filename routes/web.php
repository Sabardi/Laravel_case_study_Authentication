<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurusanController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [JurusanController::class,'index'])->middleware('auth');
Route::resource('jurusans',JurusanController::class)->middleware('auth');
Route::get('jurusans/{jurusan}',[JurusanController::class,'show'])->name('jurusans.show')->middleware('auth')->middleware('can:view,jurusan');
