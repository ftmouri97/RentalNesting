<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apartment_detail;
use App\Models\detailes_image;
use App\Models\feature_image;
use App\Models\rent_request;

class OwnerController extends Controller
{
    public function readBookingsRequests()
    {
        return "reading requests";
    }

    public function readApartmentDetails()
    {
        $apartments = apartment_detail::orderBy('id','desc')->get();
        $data = '';
        foreach ($apartments as $apartment) {
            if ($apartment->active_status == 0) {
                $active_status = '<label class="badge badge-warning">On hold</label>';
            }else{
                $active_status = '<label class="badge badge-success">On hold</label>';
            }
            $feature_image='';
            if ($apartment->featureImage) {
                $feature_image = $apartment->featureImage->image;
            }
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
            <td>'.$apartment->active_status.'</td>
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
