<?php

namespace App\Http\Controllers;

use App\Models\CatController;
use Illuminate\Http\Request;

class CatControllerController extends Controller
{
    public function index()
    {
        return view('client.page.cat');
    }
    public function index1()
    {
        return view('client.page.page.cat');
    }
    public function indexVue()
    {
        return view('client.page.admin.meo');
    }
    public function detail(Request $request)
    {
        $chitiet  = CatController::find($request -> id);
        if($chitiet) {
            return view('client.page.mo_ta_meo', compact('chitiet'));
        } else {
            return redirect('/');
        }
    }
    public function detail1(Request $request)
    {
        $chitiet  = CatController::find($request -> id);
        if($chitiet) {
            return view('client.page.page.mo_ta_meo', compact('chitiet'));
        } else {
            return redirect('/');
        }
    }
}
