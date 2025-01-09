<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::get("/login", [LoginController::class,"showLogin"])->name("login");
Route::post("/actionLogin", [LoginController::class,"actionLogin"])->name("actionLogin");
Route::get("/logout", [LoginController::class,"logout"])->name("logout");


Route::middleware(['auth'])->group(function () {

Route::get('/', [DashboardController::class,'index']);

Route::get('/jenis', [JenisController::class,'index'])->middleware(RoleMiddleware::class    . ':admin');;
Route::get('/jenis/tambah', [JenisController::class,'create'])->middleware(RoleMiddleware::class    . ':admin');;
Route::post('/jenis/simpan', [JenisController::class, 'store'])->middleware(RoleMiddleware::class    . ':admin');;

Route::get('/jenis/{id}/edit', [JenisController::class, 'edit'])->middleware(RoleMiddleware::class    . ':admin');;
Route::post('/jenis/{id}/update', [JenisController::class, 'update'])->middleware(RoleMiddleware::class    . ':admin');;

Route::get('/produk', [ProdukController::class,'index'])->middleware(RoleMiddleware::class    . ':admin');;
Route::get('/produk/tambah', [ProdukController::class,'create'])->middleware(RoleMiddleware::class    . ':admin');;
Route::post('/produk/simpan', [ProdukController::class, 'store'])->middleware(RoleMiddleware::class    . ':admin');;

Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->middleware(RoleMiddleware::class    . ':admin');;
Route::post('/produk/{id}/update', [ProdukController::class, 'update'])->middleware(RoleMiddleware::class    . ':admin');;

Route::get('/produk/{id}/delete', [ProdukController::class, 'destroy'])->middleware(RoleMiddleware::class    . ':admin');;

Route::get('/user', [UserController::class,'index'])->middleware(RoleMiddleware::class    . ':admin');;
Route::get('/user/tambah', [UserController::class,'create'])->middleware(RoleMiddleware::class    . ':admin');;
Route::post('/user/simpan', [UserController::class, 'store'])->middleware(RoleMiddleware::class    . ':admin');;

Route::get('/user/{id}/edit', [UserController::class, 'edit'])->middleware(RoleMiddleware::class    . ':admin');;
Route::post('/user/{id}/update', [UserController::class, 'update'])->middleware(RoleMiddleware::class    . ':admin');;

Route::get('/user/{id}/delete', [UserController::class, 'destroy'])->middleware(RoleMiddleware::class    . ':admin');;

Route::get('/pelanggan', [PelangganController::class,'index'])->middleware(RoleMiddleware::class    . ':admin');;
Route::get('/pelanggan/tambah', [PelangganController::class,'create'])->middleware(RoleMiddleware::class    . ':admin');;
Route::post('/pelanggan/simpan', [PelangganController::class, 'store'])->middleware(RoleMiddleware::class    . ':admin');;

Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->middleware(RoleMiddleware::class    . ':admin');;
Route::post('/pelanggan/{id}/update', [PelangganController::class, 'update'])->middleware(RoleMiddleware::class    . ':admin');;

Route::get('/pelanggan/{id}/delete', [PelangganController::class, 'destroy'])->middleware(RoleMiddleware::class    . ':admin');;

Route::get('/penjualan', [PenjualanController::class,'index']);
Route::get('/penjualan/tambah', [PenjualanController::class,'create']);
Route::post('/penjualan/simpan', [PenjualanController::class, 'store']);

Route::get('/penjualan/{id}/edit', [PenjualanController::class, 'edit']);
Route::post('/penjualan/{id}/update', [PenjualanController::class, 'update']);

// Tambahkan rute untuk melihat detail penjualan
Route::get('/penjualan/{id}/detail', [PenjualanController::class, 'detail']);
Route::post('/penjualan/{id}/addDetail', [PenjualanController::class, 'addDetail']);

Route::get('/penjualan/{id}/struk', [PenjualanController::class, 'struk']);
Route::get('/penjualan/laporan', [PenjualanController::class, 'laporan']);


});
