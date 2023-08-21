<?php

namespace App\Http\Controllers;

use App\Models\DogController;
use Illuminate\Http\Request;

class DogControllerController extends Controller
{
    public function index()
    {
        return view('client.page.dog');
    }
    public function index1()
    {
        return view('client.page.page.dog');
    }
    public function indexVue()
    {
        return view('client.page.admin.cho');
    }
    public function detail(Request $request)
    {
        $chitiet  = DogController::find($request -> id);
        if($chitiet) {
            return view('client.page.mo_ta_cho', compact('chitiet'));
        } else {
            return redirect('/');
        }
    }
    public function detail1(Request $request)
    {
        $chitiet  = DogController::find($request -> id);
        if($chitiet) {
            return view('client.page.page.mo_ta_cho', compact('chitiet'));
        } else {
            return redirect('/');
        }
    }
}
