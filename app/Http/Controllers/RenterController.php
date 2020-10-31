<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apartment_detail;
use App\Models\notification;
use App\Models\rent_confirmation;
use App\Models\rent_details;

class RenterController extends Controller
{
    //
    public function rent_details_insertion()
    {   
    $date = date('Y-m');
    $month = date("F");
 
     $renter_id = 3;
     $total_apartment = rent_confirmation::where('renter_id',$renter_id)->get();
    for($i=0;$i<sizeof($total_apartment);$i++)
    {
        $apartment_id = $total_apartment[$i]->apartment_id;
        if(!rent_details::where('renter_id',$renter_id)->where('created_at','LIKE',"%".$date."%")->first())
        {
            rent_details::create([
                "renter_id"=>$renter_id,
                "apartment_id"=>$apartment_id,
                "month"=>$month,
                "rent_status"=>0,
                "service_charge_status"=>0,
                "gas_bill_status"=>0,
                "water_bill_status"=>0
            ]);
        }

        
    }

      
    }
    public function check_notification()
    { 
        $user_id = 1;
        $date = date('Y-m');
        $check_avail = notification::where('user_id',$user_id)->where('created_at','LIKE',"%".$date."%")->first();
        if($check_avail)
        {
           
        }
        else
        {
            notification::create(['message'=>"You have due Rent",'user_id'=>$user_id]);
        }

        //echo $date;
        
        
        $notification = notification::where('user_id',$user_id)->where('status','Unread')->get();
        $total_notification = sizeof($notification);
        echo $total_notification;

    }
    public function get_rent_details()
    { 
        // $renter_id = 1;
        
        // $data = "";
        // for($i=0;$i<sizeof($notification);$i++)
        // {
        //     $sl_no = $i+1;
        //     $data.='<tr>
        //     <td>'.$sl_no.'</td>
        //     <td>'.$notification[$i]->message.'</td>
        //     <td>'.$notification[$i]->status.'</td>
        // </tr>';

        // }
        // notification::where('user_id',$user_id)->update(['status'=>"read"]);
        // echo $data;

    }
    
    public function get_notification()
    {
        $user_id = 1;
        $notification = notification::where('user_id',$user_id)->orderBy('id', 'DESC')->get();
        $data = "";
        for($i=0;$i<sizeof($notification);$i++)
        {
            $sl_no = $i+1;
            $data.='<tr>
            <td>'.$sl_no.'</td>
            <td>'.$notification[$i]->message.'</td>
            <td>'.$notification[$i]->status.'</td>
        </tr>';

        }
        notification::where('user_id',$user_id)->update(['status'=>"read"]);
        echo $data;

    }
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
       $user_id = 2;
         $apartment = apartment_detail::where('owner_id',$user_id)->get();
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
