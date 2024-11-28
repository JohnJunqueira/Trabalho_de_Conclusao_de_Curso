<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrestadorController extends Controller
{
    public function dashboard()
    {
        return view('prestador/dashboard');
    }
}
