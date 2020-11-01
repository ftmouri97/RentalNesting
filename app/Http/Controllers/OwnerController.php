<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apartment_detail;
use App\Models\detailes_image;
use App\Models\feature_image;

class OwnerController extends Controller
{
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
            $data .= '<tr>
            <td><img class="img-fluid" src="'.asset('Apartment photoes/'.$apartment->featureImage->image).'"/></td>
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
            <button class="btn btn-outline-primary" onclick="deleteApertment('.$apartment->id.')">Manage detail images</button>
            <button class="btn btn-outline-warning" onclick="deleteApertment('.$apartment->id.')">Edit</button>
            <button class="btn btn-outline-danger" onclick="editApertment('.$apartment->id.')">Delete</button>
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

    public function deleteApartmentDetails($id)
    {
        if (apartment_detail::where('id',$id)->delete()) {
            return "Succesfully deleted";
        }
    }
}
