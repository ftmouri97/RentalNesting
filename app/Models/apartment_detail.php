<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apartment_detail extends Model
{
    use HasFactory;
    protected $guarded = [];
   // protected $fillable=['owner_id','district','zone','address','total_bed','total_bath','apartment_size','apartment_description','apartment_category','flat_name','floor_no','apartment_rent','active_status','total_view','commission_status'];
    public function complains()
    {
        return $this->hasMany('App\Models\complain','apartment_id','id');
    }

    public function detailsImages()
    {
        return $this->hasMany('App\Models\detailes_image', 'apartment_id');
    }

    public function featureImage()
    {
        return $this->hasOne('App\Models\feature_image','apartment_id');
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function rent_confirmation()
    {
        return $this->hasOne('App\Models\rent_confirmation', 'apartment_id');
    }
}
