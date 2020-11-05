<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rent_request extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function apartment()
    {
        return $this->belongsTo('App\Models\apartment_detail','apartment_id','id');
    }
}
