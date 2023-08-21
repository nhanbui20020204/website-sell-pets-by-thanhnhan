<?php

namespace App\Http\Controllers;

use App\Models\DanhSachTaiKhoan;
use Illuminate\Http\Request;

class DanhSachTaiKhoanController extends Controller
{
    public function index(){
        return view('client.page.admin.tai_khoan');
    }
}
