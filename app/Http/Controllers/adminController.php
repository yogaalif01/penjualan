<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    public function barang()
    {
        return view('barang');
    }
}
