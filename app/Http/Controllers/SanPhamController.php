<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index()
    {
        return view('client.page.admin.san_pham');
    }
    public function indexVue()
    {
        return view('client.page.trangchu');
    }
    public function detail(Request $request)
    {
        $chitiet  = SanPham::find($request -> id);
        if($chitiet) {
            return view('client.page.san_pham', compact('chitiet'));
        } else {
            return redirect('/');
        }
    }
    public function detail1(Request $request)
    {
        $chitiet  = SanPham::find($request -> id);
        if($chitiet) {
            return view('client.page.page.san_pham', compact('chitiet'));
        } else {
            return redirect('/');
        }
    }
}
