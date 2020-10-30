<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apartment_detail;

class RenterController extends Controller
{
    //
    public function show_apartment_details(Request $request)
    {
        $apartment_id = $request->id;
        $apartment_details = apartment_detail::where('id',$apartment_id)->first();

        //file_put_contents('test.txt',$apartment_id);
         $data = ' <h6><b>Bed</b></h6>
         <p>'.$apartment_details->total_bed.'</p>
         <h6><b>Bath</b></h6>
         <p>'.$apartment_details->total_bath.'</p>
         <h6><b>Rent</b></h6>
         <p>'.$apartment_details->appartment_rent.'</p>
         <h6><b>Description</b></h6>
         <p>'.$apartment_details->appartment_description.'</p>';
         echo $data;
        
    }
   public function cancel_booking(Request $request)
   {
    $apartment_id = $request->id;
    apartment_detail::where('id',$apartment_id)->delete();
   }

    public function get_all_booking()
    {
    
         $apartment = apartment_detail::get();
        $data = "";
        for($i=0;$i<sizeof($apartment);$i++)
        {
            $sl_no = $i+1;
            $data.='<tr>
            <td>'.$sl_no.'</td>
            <td>'.$apartment[$i]->address.'</td>
            <td>'.$apartment[$i]->district.'</td>
            <td>'.$apartment[$i]->zone.'</td>
            
            <td>
              <button class="btn btn-outline-primary" onclick = "show_apartment_details('.$apartment[$i]->id.')">View Details</button>
            </td>
            <td>
            <button class="btn btn-outline-primary" onclick = "cancel_booking('.$apartment[$i]->id.')">Cancel Booking</button>
          </td>
        </tr>';
        }
        
     echo $data;
         
       
    }
}
