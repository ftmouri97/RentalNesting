<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rent_confirmation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function renter()
    {
        return $this->belongsTo('App\Models\User','renter_id','id');
    }
    public function owner()
    {
        return $this->belongsTo('App\Models\User','owner_id','id');
    }
    public function apartment()
    {
        return $this->belongsTo('App\Models\apartment_detail');
    }
}
