<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apartment_detail;

class FrontController extends Controller
{
    public function index()
    {
        // $district = apartment_detail::groupBy('district')->get();
        // $zones = apartment_detail::groupBy('zone')->get();
        // $beds = apartment_detail::groupBy('total_bed')->get();
        // $baths = apartment_detail::groupBy('total_bath')->get();
        $apartment = apartment_detail::where('active_status',1)->limit(6)->get();
        // return view('index',['apartments'=>$apartment,'districts'=>$district,'zones'=>$zones,'beds'=>$beds,'baths'=>$baths]);
        return view('index2',['apartments'=>$apartment]);
    }

    public function zoneSearching(Request $Request)
    {
        $data = apartment_detail::where('zone','Like',$Request->zoneSearching.'%')->get();
        foreach ($data as $value) {
            ?>
            <a href="#" class="list-group-item list-group-item-action border-1"><?php echo $value->zone." ".$value->address; ?></a>
            <?php
        }
    }

    public function aparmentDetail(Request $Request)
    {
        $data = apartment_detail::where('id',$Request->id)->first();
        return view('apartment_details',['apartment'=>$data]);
    }
}
