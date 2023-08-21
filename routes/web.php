<?php

use App\Http\Controllers\CatControllerController;
use App\Http\Controllers\ChiTietController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DanhSachTaiKhoanController;
use App\Http\Controllers\DogControllerController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\PhuKienController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\ThongBaoController;
use App\Http\Controllers\ThucAnController;
use App\Http\Controllers\TrangChuController;
use Illuminate\Support\Facades\Route;

Route::get('/gio-hang', [GioHangController::class, 'index']);
Route::get('/thong-bao', [ThongBaoController::class, 'index']);
Route::get('/thanh-toan', [GioHangController::class, 'index1']);
Route::get('/admin/trangchu', [TrangChuController::class, 'index']);
Route::get('/admin/food', [FoodController::class, 'index']);
Route::get('/', [TrangChuController::class, 'indexVue']);
Route::get('/trang-chu', [TrangChuController::class, 'indexVue1']);
Route::get('/dog', [DogControllerController::class, 'index']);
Route::get('/trang-chu/dog', [DogControllerController::class, 'index1']);
Route::get('/admin/dog', [DogControllerController::class, 'indexVue']);
Route::get('/trang-chu/cat', [CatControllerController::class, 'index1']);
Route::get('/cat', [CatControllerController::class, 'index']);
Route::get('/admin/cat', [CatControllerController::class, 'indexVue']);
Route::get('/food', [ThucAnController::class, 'index']);
Route::get('/trang-chu/food', [ThucAnController::class, 'index1']);
Route::get('/san-pham', [SanPhamController::class, 'index']);
Route::get('/admin/san-pham', [SanPhamController::class, 'indexVue']);
Route::get('/register', [CustomerController::class, 'viewRegister']);
Route::get('/login', [CustomerController::class, 'viewLogin']);
Route::get('/phu-kien', [PhuKienController::class, 'index']);
Route::get('/trang-chu/phu-kien', [PhuKienController::class, 'index1']);
Route::get('/admin/phu-kien', [PhuKienController::class, 'indexVue']);
Route::get('/danh-sach-tai-khoan', [DanhSachTaiKhoanController::class, 'index']);
Route::get('/detail/{id}', [TrangChuController::class, 'detail']);
Route::get('/trang-chu/detail/{id}', [TrangChuController::class, 'detail1']);
Route::get('/lien-quan/detail/{id}', [SanPhamController::class, 'detail']);
Route::get('/trang-chu/lien-quan/detail/{id}', [SanPhamController::class, 'detail1']);
Route::get('/cho/detail/{id}', [DogControllerController::class, 'detail']);
Route::get('/trang-chu/cho/detail/{id}', [DogControllerController::class, 'detail1']);
Route::get('/meo/detail/{id}', [CatControllerController::class, 'detail']);
Route::get('/trang-chu/meo/detail/{id}', [CatControllerController::class, 'detail1']);
Route::get('/food/detail/{id}', [ThucAnController::class, 'detail']);
Route::get('/trang-chu/food/detail/{id}', [ThucAnController::class, 'detail1']);
Route::get('/phu-kien/detail/{id}', [PhuKienController::class, 'detail']);
Route::get('/trang-chu/phu-kien/detail/{id}', [PhuKienController::class, 'detail1']);




