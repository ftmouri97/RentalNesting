<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apartment_detail;

class FrontController extends Controller
{
    public function index()
    {
        $district = apartment_detail::groupBy('district')->get();
        return view('index',['districts'=>$district]);
    }
}
