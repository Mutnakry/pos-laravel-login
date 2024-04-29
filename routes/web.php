<?php

use App\Http\Controllers\CagoryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProvineController;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

 Route::get('/category',[CagoryController::class,'index']);

 Route::get('/provines',[ProvineController::class,'index']);
 Route::get('/provines/{provine_id}',[ProvineController::class,'show']);

 Route::get('/districte/{name}/{id}',[DistrictController::class,'index']);

