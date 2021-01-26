<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complain extends Model
{
   protected $guarded = [];
   public function renter()
   {
       return $this->belongsTo('App\Models\User', 'renter_id');
   }
   public function apartment()
   {
       return $this->belongsTo('App\Models\apartment_detail', 'apartment_id','id');
   }
}
