<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student', [StudentController::class, 'index']);
Route::get('/class', [StudentController::class, 'kelas']);


Route::get('/siswa', [SiswaController::class, 'addBelajar'])->name('siswa');
Route::post('/siswa', [SiswaController::class, 'storeSiswa']);
Route::get('siswa/create', [SiswaController::class, 'createSiswa']);
Route::get('/siswa/edit/{id}', [SiswaController::class, 'editSiswa']);
Route::patch('/siswa/{id}', [SiswaController::class, 'updateSiswa']);
Route::delete('/siswa/{id}', [SiswaController::class, 'destroySiswa']);


Route::get('/kelas', [KelasController::class, 'addKelas'])->name('kelas');
Route::get('kelas/create', [KelasController::class, 'createKelas']);
Route::post('/kelas', [KelasController::class, 'storeKelas']);
Route::get('/kelas/edit/{id}', [KelasController::class, 'editKelas']);
Route::patch('/kelas/{id}', [KelasController::class, 'updateKelas']);
Route::delete('/kelas/{id}', [KelasController::class, 'destroyKelas']);

Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::post('/report', [ReportController::class, 'generate'])->name('report.generate');



