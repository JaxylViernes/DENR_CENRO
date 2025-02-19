<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MsaController;
use App\Http\Controllers\TsaController;
use App\Http\Controllers\SaController;
use App\Http\Controllers\RfpaController;
use App\Http\Controllers\FpaController;
use App\Http\Controllers\SpController;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [UserController:: class, 'login'])->name('login');

Route::post('/login-user', [UserController:: class, 'loginUser'])->name('authenticate');
Route::get('/msa', [MsaController:: class, 'msa'])->name('msa');
Route::get('/tsa', [TsaController:: class, 'tsa'])->name('tsa');
Route::get('/sa', [SaController:: class, 'sa'])->name('sa');
Route::get('/fpa',[FpaController:: class, 'fpa'])->name('fpa');
Route::get('/sp',[SpController:: class, 'sp'])->name('sp');

Route::get('/rfpa', [RfpaController:: class, 'rfpa'])->name('rfpa');
Route::get('/fpa', [FpaController:: class, 'fpa'])->name('fpa');

Route::post('/addmsa', [MsaController::class, 'addmsa'])->name('addmsa');

<<<<<<< Updated upstream
Route::delete('/delete', [MsaController::class, 'delete'])->name('deletemsa');
=======
Route::delete('/delete/{id_msa}', [MsaController::class, 'delete'])->name('deletemsa');
Route::put('/update/{id_msa}', [MsaController::class, 'update'])->name('updatemsa');
>>>>>>> Stashed changes


