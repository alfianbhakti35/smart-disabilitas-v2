<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProdiController;
use App\Models\Materi;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpSpreadsheet\RichText\Run;

// Halaman Utama website
Route::get('/', function () {
    return view('welcome');
});

// Route Halaman Login User
Route::get('/login', [AuthController::class, 'index'])->middleware('guest');
Route::post('/autentikasi', [AuthController::class, 'autentikasi']);
Route::get('/cek', [AuthController::class, 'cek']);

// Route Untuk Admin
Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/mahasiswa', [AdminController::class, 'mahasiswa']);
Route::post('/admin/importmahasiswa', [AdminController::class, 'importMahasiswa']);
Route::get('/admin/formatinfortmahasiswa', [AdminController::class, 'downloadMhs']);

Route::resource('/admin/fakultas', FacultyController::class);

Route::resource('/admin/prodi', ProdiController::class);

Route::resource('/admin/matakuliah', MataKuliahController::class);

Route::resource('/admin/materi', MateriController::class);

Route::get('/admin/dosen', [AdminController::class, 'dosen']);
Route::post('/admin/adddosen', [AdminController::class, 'storeDosen']);


// Route untuk Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/smester1', [MahasiswaController::class, 'smester1']);

// Route untuk Dosen
