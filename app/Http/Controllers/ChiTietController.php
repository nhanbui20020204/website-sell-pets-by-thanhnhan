<?php

namespace App\Http\Controllers;

use App\Models\ChiTiet;
use App\Models\TrangChu;
use Illuminate\Http\Request;

class ChiTietController extends Controller
{
    public function detail($id)
    {
        $trangchu  = TrangChu::find($id);

        if($trangchu) {
            return view('client.page.mo_ta', compact('trangchu'));
        } else {
            return redirect('/');
        }
    }
}
