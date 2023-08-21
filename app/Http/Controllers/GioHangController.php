<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    public function index()
    {
        return view('client.page.don_hang');
    }
    public function index1()
    {
        return view('client.page.thanh_toan');
    }
}
