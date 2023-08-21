<?php

namespace App\Http\Controllers;

use App\Models\TrangChu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrangChuController extends Controller
{
    public function index()
    {
        return view('client.page.admin.admin');
    }
    public function indexVue()
    {
        return view('client.page.trangchu');
    }
    public function indexVue1()
    {
        return view('client.page.page.trangchu');
    }
    public function detail(Request $request)
    {
        $chitiet  = TrangChu::find($request -> id);
        if($chitiet) {
            return view('client.page.mo_ta', compact('chitiet'));
        } else {
            return redirect('/');
        }
    }
    public function detail1(Request $request)
    {
        $chitiet  = TrangChu::find($request -> id);
        if($chitiet) {
            return view('client.page.page.mo_ta', compact('chitiet'));
        } else {
            return redirect('/');
        }
    }
}
