<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function viewRegister()
    {
        return view('client.page.register');
    }

    public function viewLogin()
    {
        return view('client.page.register');
    }
}
