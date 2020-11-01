<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apartment_detail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function detailsImages()
    {
        return $this->hasMany('App\Models\detailes_image', 'apartment_id');
    }

    public function featureImage()
    {
        return $this->hasOne('App\Models\feature_image','apartment_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'owner_id', 'id');
    }
}
