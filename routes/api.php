<?php

use App\Http\Controllers\API\APICatController;
use App\Http\Controllers\API\APIChiTietController;
use App\Http\Controllers\API\APIDanhSachTaiKhoanController;
use App\Http\Controllers\API\APIDogController;
use App\Http\Controllers\API\APIGioHangController;
use App\Http\Controllers\API\APIPhuKienController;
use App\Http\Controllers\API\APISanPhamController;
use App\Http\Controllers\API\APIThucAnController;
use App\Http\Controllers\API\APITrangChuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/trangchu', [APITrangChuController::class, 'home']);
Route::post('/dog', [APIDogController::class, 'home']);
Route::post('/cat', [APICatController::class, 'home']);
Route::post('/food', [APIThucAnController::class, 'home']);
Route::post('/phu-kien', [APIPhuKienController::class, 'home']);
Route::post('/san-pham', [APISanPhamController::class, 'home']);
Route::post('/chi-tiet', [APIChiTietController::class, 'home']);
Route::post('/login', [APIDanhSachTaiKhoanController::class, 'login'])->name('login');
Route::post('/register', [APIDanhSachTaiKhoanController::class, 'register'])->name('register');


//trang chủ
Route::group(['prefix'  =>  '/slide'], function() {
    Route::post('/create', [APITrangChuController::class, 'store'])->name('trangChuStore');
    Route::post('/data', [APITrangChuController::class, 'data'])->name('trangChuData');
    Route::post('/status', [APITrangChuController::class, 'status'])->name('trangChuStatus');
    Route::post('/info', [APITrangChuController::class, 'info'])->name('trangChuInfo');
    Route::post('/del', [APITrangChuController::class, 'destroy'])->name('trangChuDel');
    Route::post('/update', [APITrangChuController::class, 'update'])->name('trangChuUpdate');
    Route::post('/home', [APITrangChuController::class, 'home']);


    Route::group(['prefix'  =>  '/food'], function() {
        Route::post('/create', [APIThucAnController::class, 'store'])->name('thucAnStore');
        Route::post('/data', [APIThucAnController::class, 'data'])->name('thucAnData');
        Route::post('/status', [APIThucAnController::class, 'status'])->name('thucAnStatus');
        Route::post('/info', [APIThucAnController::class, 'info'])->name('thucAnInfo');
        Route::post('/del', [APIThucAnController::class, 'destroy'])->name('thucAnDel');
        Route::post('/update', [APIThucAnController::class, 'update'])->name('thucAnUpdate');
        Route::post('/home', [APIThucAnController::class, 'home']);

        Route::group(['prefix'  =>  '/dog'], function() {
            Route::post('/create', [APIDogController::class, 'store'])->name('dogStore');
            Route::post('/data', [APIDogController::class, 'data'])->name('dogData');
            Route::post('/status', [APIDogController::class, 'status'])->name('dogStatus');
            Route::post('/info', [APIDogController::class, 'info'])->name('dogInfo');
            Route::post('/del', [APIDogController::class, 'destroy'])->name('dogDel');
            Route::post('/update', [APIDogController::class, 'update'])->name('dogUpdate');
            Route::post('/home', [APIDogController::class, 'home']);

            Route::group(['prefix'  =>  '/san-pham'], function() {
                Route::post('/create', [APISanPhamController::class, 'store'])->name('sanPhamStore');
                Route::post('/data', [APISanPhamController::class, 'data'])->name('sanPhamData');
                Route::post('/status', [APISanPhamController::class, 'status'])->name('sanPhamStatus');
                Route::post('/info', [APISanPhamController::class, 'info'])->name('sanPhamInfo');
                Route::post('/del', [APISanPhamController::class, 'destroy'])->name('sanPhamDel');
                Route::post('/update', [APISanPhamController::class, 'update'])->name('sanPhamUpdate');
                Route::post('/home', [APISanPhamController::class, 'home']);
            });
            Route::group(['prefix'  =>  '/chi-tiet'], function() {
                Route::post('/create', [APIChiTietController::class, 'store'])->name('chiTietStore');
                Route::post('/data', [APIChiTietController::class, 'data'])->name('chiTietData');
                Route::post('/status', [APIChiTietController::class, 'status'])->name('chiTietStatus');
                Route::post('/info', [APIChiTietController::class, 'info'])->name('chiTietInfo');
                Route::post('/del', [APIChiTietController::class, 'destroy'])->name('chiTietDel');
                Route::post('/update', [APIChiTietController::class, 'update'])->name('chiTietUpdate');
                Route::post('/home', [APIChiTietController::class, 'home']);
            });
        });
        Route::group(['prefix'  =>  '/cat'], function() {
            Route::post('/create', [APICatController::class, 'store'])->name('catStore');
            Route::post('/data', [APICatController::class, 'data'])->name('catData');
            Route::post('/status', [APICatController::class, 'status'])->name('catStatus');
            Route::post('/info', [APICatController::class, 'info'])->name('catInfo');
            Route::post('/del', [APICatController::class, 'destroy'])->name('catDel');
            Route::post('/update', [APICatController::class, 'update'])->name('catUpdate');
            Route::post('/home', [APICatController::class, 'home']);
        });
        Route::group(['prefix'  =>  '/phu-kien'], function() {
            Route::post('/create', [APIPhuKienController::class, 'store'])->name('phuKienStore');
            Route::post('/data', [APIPhuKienController::class, 'data'])->name('phuKienData');
            Route::post('/status', [APIPhuKienController::class, 'status'])->name('phuKienStatus');
            Route::post('/info', [APIPhuKienController::class, 'info'])->name('phuKienInfo');
            Route::post('/del', [APIPhuKienController::class, 'destroy'])->name('phuKienDel');
            Route::post('/update', [APIPhuKienController::class, 'update'])->name('phuKienUpdate');
            Route::post('/home', [APIPhuKienController::class, 'home']);
        });
        Route::post('/update', [APIGioHangController::class, 'update'])->name('gioHangUpdate');

});
Route::group(['prefix'  =>  '/danh-sach-tai-khoan'], function() {
    Route::post('/create', [APIDanhSachTaiKhoanController::class, 'store'])->name('taiKhoanStore');
    Route::post('/data', [APIDanhSachTaiKhoanController::class, 'data'])->name('taiKhoanData');
    Route::post('/status', [APIDanhSachTaiKhoanController::class, 'status'])->name('taiKhoanStatus');
    Route::post('/block', [APIDanhSachTaiKhoanController::class, 'block'])->name('taiKhoanBlock');
    Route::post('/info', [APIDanhSachTaiKhoanController::class, 'info'])->name('taiKhoanInfo');
    Route::post('/del', [APIDanhSachTaiKhoanController::class, 'destroy'])->name('taiKhoanDel');
    Route::post('/update', [APIDanhSachTaiKhoanController::class, 'update'])->name('taiKhoanUpdate');
});
});
