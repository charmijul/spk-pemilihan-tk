<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpkController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DatatkController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubkriteriaController;
use App\Http\Controllers\DashboardDatatkController;
use App\Http\Livewire\MapLocation;

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
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/roc', function () {
    return view('roc', [
        "title" => "ROC"
    ]);
});
Route::get('/waspas', function () {
    return view('waspas', [
        "title" => "WASPAS"
    ]);
});

Route::get('/panduan', function () {
    return view('panduan', [
        "title" => "Guide"
    ]);
});

Route::get('/datatk', [DatatkController::class, 'index']);

Route::get('/datatk/{datatk:name}', [DatatkController::class, 'show']);

Route::get('/kriteria', [SubkriteriaController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('auth');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard',function(){
    return view('dashboard.index',[
        'title' => 'Dashboard'
    ]);
})->middleware('auth');

Route::resource('/dashboard/datatk', DashboardDatatkController::class)
->middleware('auth');

Route::get('/spk', [SpkController::class, 'index']);
Route::post('/spk/roc', [SpkController::class, 'spk']);

Route::get('/map', MapLocation::class);
Route::get('/getMiles', [SpkController::class, 'miles']);
