<?php

namespace App\Http\Controllers;

use App\Models\ThucAn;
use Illuminate\Http\Request;

class ThucAnController extends Controller
{

    public function index()
    {
        return view('client.page.thucan');
    }
    public function index1()
    {
        return view('client.page.page.thucan');
    }
    public function detail(Request $request)
    {
        $chitiet  = ThucAn::find($request -> id);
        if($chitiet) {
            return view('client.page.mo_ta_food', compact('chitiet'));
        } else {
            return redirect('/');
        }
    }
    public function detail1(Request $request)
    {
        $chitiet  = ThucAn::find($request -> id);
        if($chitiet) {
            return view('client.page.page.mo_ta_food', compact('chitiet'));
        } else {
            return redirect('/');
        }
    }

}
