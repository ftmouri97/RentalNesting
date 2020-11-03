<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rent_details extends Model
{
    protected $table = 'rent_details';
    protected $guarded = [];

    public function renter()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function apartment()
    {
        return $this->belongsTo('App\Models\apartment_detail');
    }
}
