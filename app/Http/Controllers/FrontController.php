<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apartment_detail;
use App\Models\otp;
use App\Models\User;
use App\Models\rent_request;

class FrontController extends Controller
{
    public function sendingOtp(Request $Request)
    {
        $user = User::where('id',$Request->user)->first();
        $otp = otp::where('user_id',$Request->user)->where('otp',$Request->otp)->first();
        if ($otp) {
            $user->status = 1;
            $user->save();
            if ($user->user_role == 'owner') {
                return redirect()->route('login')->with('message','Registration successfull. wait for approve your account.');
            }else{
                return redirect()->route('login')->with('message','Registration successfull');
            }
        }
        else {
            return redirect()->back()->with('message','Incorrect otp! give correct otp.');
        }
    }


    public function apartmentSearching(Request $Request)
    {
        $location = explode(',',$Request->zone);
        $distri = '';
         if (count($location)>1) {
            $distri = $location[1];
         }
         $district = $distri;
         $zone = $location[0];
         $data = apartment_detail::where('active_status',1)->where('apartment_rent','<',$Request->price_max)->get();
        //  $data = apartment_detail::where('active_status',1)->where('apartment_rent','<',$Request->price_max)->where('apartment_rent','>',$Request->price_min)->where('zone',$zone)->where('district',$district)->get();
        //  file_put_contents('asd.text',$data);
        if (count($data)>0) {
            for ($i=0; $i < count($data); $i++) {
                $feature_image='';
                if (isset($data[$i]->featureImage)) {
                    $feature_image = $data[$i]->featureImage->image;
                }
                ?>
                <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="single_property">
                            <div class="property_thumb">
                                <div class="property_tag">
                                    For Sale
                                </div>

                                <img src="Apartment photoes/<?php echo $feature_image ?>" alt="">
                            </div>
                            <div class="property_content">
                                <div class="main_pro">
                                    <h3><a href="apartment-details/<?php echo $data[$i]->id ?>">Comfortable Apartment in
                                    <?php echo $data[$i]->zone ?></a></h3>
                                    <div class="mark_pro">
                                        <img src="assets/realstate/img/svg_icon/location.svg" alt="">
                                        <span>Popular Properties</span>
                                    </div>
                                    <span class="amount">From <?php echo $data[$i]->apartment_rent ?></span>
                                </div>
                            </div>
                            <div class="footer_pro">
                                <ul>
                                    <li>
                                        <div class="single_info_doc">
                                            <img src="assets/realstate/img/svg_icon/square.svg" alt="">
                                            <span><?php echo $data[$i]->apartment_size ?></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_info_doc">
                                            <img src="assets/realstate/img/svg_icon/bed.svg" alt="">
                                            <span><?php echo $data[$i]->total_bed ?></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_info_doc">
                                            <img src="assets/realstate/img/svg_icon/bath.svg" alt="">
                                            <span><?php echo $data[$i]->total_bath ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
        else{
            ?>
            <h3 class="mx-auto">Apartment not vailable</h3>
            <?php
        }

    }

    public function index()
    {
        $apartment = apartment_detail::where('active_status',1)->get();
        return view('index',['apartments'=>$apartment]);
    }

    public function zoneSearching(Request $Request)
    {
        $data = apartment_detail::where('active_status',1)->where('zone','Like',$Request->zoneSearching.'%')->groupBy('zone')->get();
        foreach ($data as $value) {
            ?>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action border-1 district-item"><?php echo $value->zone.",".$value->district;?></a>
            <?php
        }
    }

    public function aparmentDetail(Request $Request)
    {
        $data = apartment_detail::where('id',$Request->id)->first();
        $status_check = 'false';
        if (auth()->check()) {
            if (rent_request::where('apartment_id',$Request->id)->where('renter_id',auth()->user()->id)->first()) {
                $status_check = 'true';
            }
        }
        return view('apartment_details',['apartment'=>$data,'status_check'=>$status_check]);
    }
}
