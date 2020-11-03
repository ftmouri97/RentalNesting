<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apartment_detail;
use App\Models\detailes_image;
use App\Models\feature_image;
use App\Models\rent_request;
use App\Models\rent_confirmation;
use App\Models\rent_details;
use App\Models\User;
use Auth;

class OwnerController extends Controller
{
    public function complainShowing()
    {
        ?>
        <table id="order-listing" class="table">
            <thead>
            <tr>
                <th>SL No#</th>
                <th>Renter name</th>
                <th>Apertment</th>
                <th>Message</th>
            </tr>
            </thead>
            <tbody>
        <?php
        $apartments = Auth::user()->apartments()->orderBy('id','desc')->get();
        foreach ($apartments as $apartment) {
            $complains = $apartment->complains;
            foreach ($complains as $complain) {
                ?>
                <tr>
                    <td><?php echo $complain->id ?></td>
                    <td><?php echo $complain->renter->name ?></td>
                    <td><?php echo $complain->apartment->flat_name ?> ,<?php echo $complain->apartment->address ?> ,<?php echo $complain->apartment->district ?></td>
                    <td><?php echo $complain->message ?></td>
                </tr>
                <?php
            }
        }
        ?>
            </tbody>
        </table>
        <script src="../assets/melody/js/data-table.js"></script>
        <?php
    }

    public function gasBillShowing()
    {
        $rentDetail = rent_details::where('gas_bill_status',1)->get();
        ?>
        <table class="table" id="order-listing">
            <thead>
                <tr>
                    <th>Sl No #</th>
                    <th>Month</th>
                    <th>Renter</th>
                    <th>Apertment</th>
                    <th>Gas bill staus</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($rentDetail as $value) {
                ?>
                <tr>
                    <td><?php echo $value->id ?></td>
                    <td><?php echo $value->month ?></td>
                    <td><?php echo $value->renter->name ?></td>
                    <td><?php echo $value->apartment->flat_name ?></td>
                    <td><label class="badge badge-success">Paid</label></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="../assets/melody/js/data-table.js"></script>
        <?php
    }

    public function serviceChargeShowing()
    {
        $rentDetail = rent_details::where('service_charge_status',1)->get();
        ?>
        <table class="table" id="order-listing">
            <thead>
                <tr>
                    <th>Sl No #</th>
                    <th>Month</th>
                    <th>Renter</th>
                    <th>Apertment</th>
                    <th>Service charge staus</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($rentDetail as $value) {
                ?>
                <tr>
                    <td><?php echo $value->id ?></td>
                    <td><?php echo $value->month ?></td>
                    <td><?php echo $value->renter->name ?></td>
                    <td><?php echo $value->apartment->flat_name ?></td>
                    <td><label class="badge badge-success">Paid</label></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="../assets/melody/js/data-table.js"></script>
        <?php
    }

    public function rentShowing()
    {
        $rentDetail = rent_details::where('rent_status',1)->get();
        ?>
        <table class="table" id="order-listing">
            <thead>
                <tr>
                    <th>Sl No #</th>
                    <th>Month</th>
                    <th>Renter</th>
                    <th>Apertment</th>
                    <th>Rent staus</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($rentDetail as $value) {
                ?>
                <tr>
                    <td><?php echo $value->id ?></td>
                    <td><?php echo $value->month ?></td>
                    <td><?php echo $value->renter->name ?></td>
                    <td><?php echo $value->apartment->flat_name ?></td>
                    <td><label class="badge badge-success">Paid</label></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="../assets/melody/js/data-table.js"></script>
        <?php
    }

    public function rentAccepting(Request $Request)
    {
        rent_details::where('id',$Request->id)->update(['rent_status'=>1]);
    }

    public function serviceChargeAccepting(Request $Request)
    {
        rent_details::where('id',$Request->id)->update(['service_charge_status'=>1]);
    }

    public function gasBillAccepting(Request $Request)
    {
        rent_details::where('id',$Request->id)->update(['gas_bill_status'=>1]);
    }

    public function readRenterDetails()
    {
        $owner_id = Auth::user()->id;
        $rent_detail = rent_details::where('owner_id',$owner_id)->get();
        ?>
        <table id="order-listing" class="table">
            <thead>
                <tr>
                    <th>Sl No#</th>
                    <th>Month</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Apertment</th>
                    <th>Rent status</th>
                    <th>Service charge status</th>
                    <th>Gas bill status</th>
                </tr>
              </thead>
              <tbody >
        <?php
        for ($i=0; $i < count($rent_detail); $i++) {
            $renter = User::where('id',$rent_detail[$i]->renter_id)->first();
            $apartment = apartment_detail::where('id',$rent_detail[$i]->apartment_id)->first();

            $rent_status = $rent_detail[$i]->rent_status==0?'<button class="btn btn-outline-warning" onclick="rent_accepting('.$rent_detail[$i]->id.')">Due</button>':'<label class="badge badge-success">Paid</label>';
            $service_charge_status = $rent_detail[$i]->service_charge_status==0?'<button class="btn btn-outline-warning" onclick="service_charge_accepting('.$rent_detail[$i]->id.')">Due</button>':'<label class="badge badge-success">Paid</label>';
            $gas_bill_status = $rent_detail[$i]->gas_bill_status==0?'<button class="btn btn-outline-warning" onclick="gasbill_accepting('.$rent_detail[$i]->id.')">Due</button>':'<label class="badge badge-success">Paid</label>';
            ?>
            <tr>
                <td><?php echo $rent_detail[$i]->id ?></td>
                <td><?php echo $rent_detail[$i]->month ?></td>
                <td><?php echo $renter->name ?></td>
                <td><?php echo $renter->phone ?></td>
                <td><?php echo $apartment->name.','.$apartment->address ?></td>
                <td><?php echo $rent_status; ?></td>
                <td><?php echo $service_charge_status; ?></td>
                <td><?php echo $gas_bill_status; ?></td>
            </tr>
            <?php
        }
        ?>
            </tbody>
        </table>
        <script src="../assets/melody/js/data-table.js"></script>
        <?php
    }

    public function acceptBookingRequest(Request $Request)
    {
        // $owner_id = Auth::check()?Auth::user()->id:2;
        $rent = rent_request::where('id',$Request->rent_request_id)->first();
        rent_request::where('id',$Request->rent_request_id)->update(['status'=>1]);
        rent_request::where('apartment_id',$rent->apartment_id)->update(['status'=>2]);
        rent_confirmation::create(['renter_id'=>$rent->renter_id,'owner_id'=>$rent->owner_id,'apartment_id'=>$rent->apartment_id,'advance_payment'=>$Request->advance_rent,'status'=>0]);
    }

    public function deleteBookingRequest(Request $Request)
    {
        rent_request::where('id',$Request->id)->update(['status'=>2]);
    }

    public function readBookingsRequests()
    {
        $owner_id = Auth::check()?Auth::user()->id:2;
        $data = rent_request::where('owner_id',$owner_id)->where('status',0)->get();
        for ($i=0; $i < count($data); $i++) {
            $renter=User::where('id',$data[$i]->renter_id)->first();
            $apartment=apartment_detail::where('id',$data[$i]->apartment_id)->first();
            ?>
            <tr>
                <td><?php echo $i+1 .$data[$i]->id; ?></td>
                <td><?php echo $renter->name; ?></td>
                <td><?php echo $renter->phone; ?></td>
                <td><?php echo $apartment->address." , ".$apartment->district; ?></td>
                <td><button class="btn btn-primary" onclick="accept_booking_request(<?php echo $data[$i]->id; ?>)">Accept</button></td>
                <td><button class="btn btn-danger" onclick="delete_booking_request(<?php echo $data[$i]->id; ?>)">Delete</button></td>
            </tr>
            <?php
        }
    }

    public function readApartmentDetails()
    {
        $apartments = Auth::user()->apartments()->orderBy('id','desc')->get();
        $data = '';
        foreach ($apartments as $apartment) {
            $feature_image='';
            if ($apartment->featureImage) {
                $feature_image = $apartment->featureImage->image;
            }
            $active_status = ($apartment->active_status==0?'<label class="badge badge-success">On hold</label>':$apartment->active_status==1)?'<label class="badge badge-primary">Approved</label>':'<label class="badge badge-danger">Denied</label>';
            $data .= '<tr>
            <td><img class="img-fluid" src="'.asset('Apartment photoes/'.$feature_image).'"/></td>
            <td>'.$apartment->floor_no.'</td>
            <td>'.$apartment->flat_name.'</td>
            <td>'.$apartment->district.'</td>
            <td>'.$apartment->zone.'</td>
            <td>'.$apartment->address.'</td>
            <td>'.$apartment->total_bed.'</td>
            <td>'.$apartment->total_bath.'</td>
            <td>'.$apartment->apartment_size.'</td>
            <td>'.$apartment->apartment_description.'</td>
            <td>'.$apartment->apartment_rent.'</td>
            <td>'.$apartment->commission_status.'</td>
            <td>'.$active_status.'</td>
            <td>
            <button class="btn btn-outline-primary" onclick="manageDetailImages('.$apartment->id.')">Manage detail images</button>
            <button class="btn btn-outline-warning" onclick="editApertment('.$apartment->id.')">Edit</button>
            <button class="btn btn-outline-danger" onclick="deleteApertment('.$apartment->id.')">Delete</button>
            </td>
        </tr>';
        }
        return $data;
    }


    public function createApartmentDetails(Request $Request)
    {
        $apartment = apartment_detail::create(['owner_id'=>2,'district'=>$Request->district, 'zone'=>$Request->zone, 'address'=>$Request->address, 'total_bed'=>$Request->total_bed, 'total_bath'=>$Request->total_bath, 'apartment_size'=>$Request->apartment_size, 'apartment_description'=>$Request->apartment_description, 'flat_name'=>$Request->flat_name, 'floor_no'=>$Request->floor_no, 'apartment_rent'=>$Request->apartment_rent, 'active_status'=>0, 'commission_status'=>0]);
        if ($apartment) {
            $fileName = time().'.'.$Request->feature_image->extension();
            $Request->feature_image->move(public_path('../Apartment photoes'), $fileName);
            feature_image::create(['apartment_id'=>$apartment->id,'image'=>$fileName]);
            if ($Request->file('detail_image')) {
                $increment = 1;
                foreach ($Request->file('detail_image') as $detail_image) {
                    $filesName = time().$increment.'.'.$detail_image->extension();
                    $detail_image->move(public_path('../Apartment photoes'), $filesName);
                    detailes_image::create(['apartment_id'=>$apartment->id,'image'=>$filesName]);
                    $increment++;
                }
            }

            return "Succesfully created";
        }
    }

    public function editApartmentDetails(Request $Request)
    {
        return apartment_detail::where('id',$Request->id)->with('featureImage')->first();
    }

    public function updateApartmentDetails(Request $Request)
    {
        apartment_detail::where('id',$Request->id)->update(['district'=>$Request->district, 'zone'=>$Request->zone, 'address'=>$Request->address, 'total_bed'=>$Request->total_bed, 'total_bath'=>$Request->total_bath, 'apartment_size'=>$Request->apartment_size, 'apartment_description'=>$Request->apartment_description, 'flat_name'=>$Request->flat_name, 'floor_no'=>$Request->floor_no, 'apartment_rent'=>$Request->apartment_rent]);
        if ($Request->file('feature_image')) {
            if ($Request->feature_image_value) {
                feature_image::where('apartment_id',$Request->id)->delete();
                unlink('Apartment photoes/'.$Request->feature_image_value);
            }

            $fileName = time().'.'.$Request->feature_image->extension();
            $Request->feature_image->move(public_path('../Apartment photoes'), $fileName);
            feature_image::create(['apartment_id'=>$Request->id,'image'=>$fileName]);
        }
        return "Updated successfully";
    }

    public function manageApartmentDetailsImages(Request $Request)
    {
        $images = detailes_image::where('apartment_id',$Request->id)->get();
        if (count($images)>0) {
        foreach ($images as $image) {

            ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo asset('Apartment photoes/'.$image->image) ?>" alt="" class="img-fluid" id="edit-category-image" >
                    </div>
                    <div class="card-footer">
                        <button onclick="delete_single_image('<?php echo $image->id ?>','<?php echo $image->image ?>')" class="btn btn-light">Delete <i class="anticon anticon-delete"></i></button>
                    </div>
                </div>
            </div>
            <?php
            }
            }else{
                ?>
                <h3 class="mx-auto">No image available</h3>
                <?php
            }
    }

    public function createApartmentDetailsImages(Request $Request)
    {
        $increment = 1;
        foreach ($Request->file('detail_images') as $detail_image) {
            $filesName = time().$increment.'.'.$detail_image->extension();
            $detail_image->move(public_path('../Apartment photoes'), $filesName);
            detailes_image::create(['apartment_id'=>$Request->apartment_id,'image'=>$filesName]);
            $increment++;
        }
    }

    public function deleteApartmentDetailsSingleImage(Request $Request)
    {
        if (detailes_image::where('id',$Request->id)->delete()) {
            unlink('Apartment photoes/'.$Request->image);
        }
    }

    public function deleteApartmentDetails(Request $Request)
    {
        if ($detail_image = detailes_image::where('apartment_id',$Request->id)->get()) {
            foreach ($detail_image as $images) {
                unlink('Apartment photoes/'.$images->image);
                detailes_image::where('id',$images->id)->delete();
            }
        }
        if ($feature_image = feature_image::where('apartment_id',$Request->id)->first()) {
            unlink('Apartment photoes/'.$feature_image->image);
            feature_image::where('id',$feature_image->id);
        }
        apartment_detail::where('id',$Request->id)->delete();
        return "Succesfully deleted";
    }
}
