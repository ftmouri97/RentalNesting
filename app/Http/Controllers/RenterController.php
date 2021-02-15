<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apartment_detail;
use App\Models\notification;
use App\Models\rent_confirmation;
use App\Models\rent_details;
use App\Models\complain;
use App\Models\rent_request;
use Auth;
use App\Models\User;

class RenterController extends Controller
{

    public function read_owner_info()
    {
        ?>
        <table id="order-listing" class="table">
            <thead>
            <tr>
                <th>SL No#</th>
                <th>Apartment</th>
                <th>Owner name</th>
                <th>Owner Image</th>
                <th>Owner phone</th>
                <th>Owner email</th>
                <th>Agreement Paper</th>
                <th> Agreement Remaining Day</th>

            </tr>
            </thead>
            <tbody>
        <?php
        $renters = rent_confirmation::where('renter_id',auth()->user()->id)->get();
        foreach ($renters as $renter) {
            $date = date("Y-m-d");

            $contract_end =date('Y-m-d', strtotime('+'.$renter->contract_year.' years', strtotime($renter->created_at)));
            //$remain_day =date_diff($contract_end,$date);
            $diff = abs(strtotime($contract_end) - strtotime($date));
            $remain_day = floor($diff / 86400);
            ?>
            <tr>
                <td><?php echo $renter->id ?></td>
                <td><?php echo $renter->apartment->flat_name.", ".$renter->apartment->floor_no.", ".$renter->apartment->zone.", ".$renter->apartment->address.", ".$renter->apartment->district ?></td>
                <td><?php echo $renter->owner->name ?></td>
                <td><img src="../user_photos/<?php echo $renter->owner->image ?>" style="border-radius:0%;height:80px;width:80px"></td>
                <td><?php echo $renter->owner->phone ?></td>
                <td><?php echo $renter->owner->email ?></td>
                <td>
                    <a href='agreement_show/<?php echo $renter->id ?>'>Show</a>
                </td>
                <td>
                    <?php echo $remain_day ?> Days
                </td>

            </tr>
            <?php
            }
        ?>
            </tbody>
        </table>
        <script src="../assets/melody/js/data-table.js"></script>
        <?php
    }
    public function renter_dashboard()
    {
        $renter_id = Auth::user()->id;
        $renter_info = rent_confirmation::where('renter_id',$renter_id)->first();

        if($renter_info)

        {
            $owner_id = $renter_info->owner_id;
            $owner_name = user::where('id',$owner_id)->first()->name;
            $owner_contact_no = user::where('id',$owner_id)->first()->phone;
            $owner_address = apartment_detail::where('owner_id',$owner_id)->first();
            $address = $owner_address->address.",".$owner_address->zone.",".$owner_address->district;

        }
        else
        {
            $address = "Not Available";
            $owner_contact_no = "Not Available";
            $owner_name = "Not Available";
        }
        return view('renter.dashboard',compact('address','owner_contact_no','owner_name'));
    }

    public function send_otp()
    {
        $mobile_number = "01845318609";
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "http://13.250.7.83/exam/api/send_sms",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"msisdn\"\r\n\r\n".$mobile_number."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"msg\"\r\n\r\ntest\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                "postman-token: 24205d22-b04d-11ff-d75e-37564e566b5c"
            ),
            ));

            $response = curl_exec($curl);
            file_put_contents('test.txt',$response);
            // $err = curl_error($curl);

            // curl_close($curl);

            // if ($err) {
            // echo "cURL Error #:" . $err;
            // } else {
            // echo $response;
            // }

    }

    public function rentApartment(Request $Request)
    {
        $apartment = apartment_detail::where('id',$Request->id)->first();
        if (rent_request::create(['renter_id'=>auth()->user()->id,'apartment_id'=>$Request->id,'owner_id'=>$apartment->owner->id,'status'=>0])) {

            return redirect()->back()->with('msg',"Your booking request has been sent successfully..");
        }

    }

    //
    public function rent_details_insertion()
    {
    $date = date('Y-m');
    $month = date("F");

     $renter_id =  Auth::user()->id;;
     $total_apartment = rent_confirmation::where('renter_id',$renter_id)->first();
     if(!rent_details::where('renter_id',$renter_id)->where('created_at','LIKE',"%".$date."%")->first())
     {
        $apartment_id = $total_apartment->apartment_id;
        $owner_id = apartment_detail::where('id',$apartment_id)->first()->owner_id;
        rent_details::create([
            "renter_id"=>$renter_id,
            "apartment_id"=>$apartment_id,
            "owner_id"=>$owner_id,
            "month"=>$month,
            "rent_status"=>0,
            "service_charge_status"=>0,
            "gas_bill_status"=>0
        ]);
     }


    }
    public function check_notification()
    {
        $user_id =  Auth::user()->id;;
        $date = date('Y-m');
        $month = date("F");
        $rent_confimation = rent_confirmation::where('renter_id',$user_id)->first();
        if($rent_confimation)
        {
        $check_avail = notification::where('user_id',$user_id)->where('created_at','LIKE',"%".$date."%")->first();
        if($check_avail)
        {

        }
        else
        {
            notification::create(['message'=>"You have due Rent on ".$month,'user_id'=>$user_id]);
        }

        //echo $date;
    }

        $notification = notification::where('user_id',$user_id)->where('status','Unread')->get();
        $total_notification = sizeof($notification);
        echo $total_notification;

    }
    public function get_service_charge_details()
    {
        $renter_id =  Auth::user()->id;;
        $rent_details = rent_details::where('renter_id',$renter_id)->orderby('id','desc')->get();


        $data = "";
        for($i=0;$i<sizeof($rent_details);$i++)
        {
            $sl_no = $i+1;
            $data.='<tr>
            <td>'.$sl_no.'</td>
            <td>'.$rent_details[$i]->month.'</td>
            ';
            if($rent_details[$i]->service_charge_status == 0)
            {
                $data.=' <td style="color:red">Due</td>';
            }
            else
            {
                $data.=' <td style="color:green">Paid</td>';
            }



        $data.='</tr>';

        }
        // notification::where('user_id',$user_id)->update(['status'=>"read"]);
         echo $data;

    }
    public function submit_complain(Request $request)
    {
        $renter_id =  Auth::user()->id;;
        $appartment_id = rent_confirmation::where('renter_id',$renter_id)->first()->apartment_id;
        $message = $request->message;
        complain::create([
            'renter_id'=>$renter_id,
            'apartment_id'=>$appartment_id,
            'message'=>$message
        ]);


    }
    public function get_gas_bill_details()
    {
        $renter_id =  Auth::user()->id;;
        $rent_details = rent_details::where('renter_id',$renter_id)->orderby('id','desc')->get();


        $data = "";
        for($i=0;$i<sizeof($rent_details);$i++)
        {
            $sl_no = $i+1;
            $data.='<tr>
            <td>'.$sl_no.'</td>
            <td>'.$rent_details[$i]->month.'</td>
            ';
            if($rent_details[$i]->gas_bill_status == 0)
            {
                $data.=' <td style="color:red">Due</td>';
            }
            else
            {
                $data.=' <td style="color:green">Paid</td>';
            }



        $data.='</tr>';

        }
        // notification::where('user_id',$user_id)->update(['status'=>"read"]);
         echo $data;

    }
    public function get_rent_details()
    {
        $renter_id =  Auth::user()->id;
        $rent_details = rent_details::where('renter_id',$renter_id)->orderby('id','desc')->get();


        $data = "";
        for($i=0;$i<sizeof($rent_details);$i++)
        {
            $sl_no = $i+1;
            $data.='<tr>
            <td>'.$sl_no.'</td>
            <td>'.$rent_details[$i]->month.'</td>
            ';
            if($rent_details[$i]->rent_status == 0)
            {
                $data.=' <td style="color:red">Due</td>';
            }
            else
            {
                $data.=' <td style="color:green">Paid</td>';
            }



        $data.='</tr>';

        }
        // notification::where('user_id',$user_id)->update(['status'=>"read"]);
         echo $data;

    }

    public function get_notification()
    {
        $user_id =  Auth::user()->id;;
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
         <p>'.$apartment_details->apartment_rent.'</p>
         <h6><b>Description</b></h6>
         <p>'.$apartment_details->apartment_description.'</p>';
         echo $data;

    }
   public function cancel_booking(Request $request)
   {
    $apartment_id = $request->id;
    apartment_detail::where('id',$apartment_id)->delete();
   }

    public function get_all_booking()
    {
       $user_id =  Auth::user()->id;;
       $apartment_list = rent_request::where('renter_id',$user_id)->get();

       $data = "";
       for($j=0;$j<sizeof($apartment_list);$j++)
       {
        $apartment = apartment_detail::where('id',$apartment_list[$j]->apartment_id)->first();
        $sl_no = $j+1;
        $data.='<tr>
        <td>'.$sl_no.'</td>
        <td>'.$apartment->address.'</td>
        <td>'.$apartment->district.'</td>
        <td>'.$apartment->zone.'</td>

        <td>
          <button class="btn btn-outline-primary" onclick = "show_apartment_details('.$apartment->id.')">View Details</button>
        </td>
        <td>
        <button class="btn btn-outline-primary" onclick = "cancel_booking('.$apartment->id.')">Cancel Booking</button>
      </td>
    </tr>';

       }


     echo $data;


    }

    public function readProfile(Request $request)
    {
        return User::where('id',$request->user()->id)->first();
    }

    public function changeProfile(Request $request)
    {
        User::where('id',auth()->user()->id)->update(['name'=>$request->name,'email'=>$request->email]);
    }
    public function payment(){
    	return view('renter.payment');
    }

    public function store(){
    	$this->validate(request(),[
          'name'=>'required',
          'email'=>'required',
          'owner_name'=>'required',
          'address'=>'required',
          'holding_no'=>'required',
          'amount'=>'required',



    	]);
    

    Payment::create([

       'name'=>request()->input('name'),
       'email'=>request()->input('email'),
       'owner_name'=>request()->input('owner_name'),
       'address'=>request()->input('address'),
       'holding_no'=>request()->input('holding_no'),
       'amount'=>request()->input('amount'),



    ]);
    return back()->with('success','Payment completed successfully');
  }
}
