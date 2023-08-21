<?php

namespace App\Http\Controllers;

use App\Models\ThongBao;
use Illuminate\Http\Request;

class ThongBaoController extends Controller
{
    public function index()
    {
        return view('client.page.admin.thong_bao');
    }
}
