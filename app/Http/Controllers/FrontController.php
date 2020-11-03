<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apartment_detail;

class FrontController extends Controller
{
    public function index()
    {
        $district = apartment_detail::groupBy('district')->get();
        $zones = apartment_detail::groupBy('zone')->get();
        $beds = apartment_detail::groupBy('total_bed')->get();
        $baths = apartment_detail::groupBy('total_bath')->get();
        $apartment = apartment_detail::skip(30)->limit(6)->get();
        return view('index2',['apartments'=>$apartment,'districts'=>$district,'zones'=>$zones,'beds'=>$beds,'baths'=>$baths]);
    }

    public function aparmentDetail(Request $Request)
    {
        $data = apartment_detail::where('id',$Request->id)->first();
        return view('apartment_details',['apartment'=>$data]);
    }
}
