<?php

namespace App\Http\Controllers;

use App\Models\PhuKien;
use Illuminate\Http\Request;

class PhuKienController extends Controller
{
    public function index()
    {
        return view('client.page.phu_kien');
    }
    public function index1()
    {
        return view('client.page.page.phu_kien');
    }
    public function indexVue()
    {
        return view('client.page.admin.phu_kien');
    }
    public function detail(Request $request)
    {
        $chitiet  = PhuKien::find($request -> id);
        if($chitiet) {
            return view('client.page.mo_ta_phu_kien', compact('chitiet'));
        } else {
            return redirect('/');
        }
    }
    public function detail1(Request $request)
    {
        $chitiet  = PhuKien::find($request -> id);
        if($chitiet) {
            return view('client.page.page.mo_ta_phu_kien', compact('chitiet'));
        } else {
            return redirect('/');
        }
    }
}
