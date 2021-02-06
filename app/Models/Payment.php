<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{ 
    protected $fillable=[
    'name','email','owner_name','address','holding_no','total_price','amount',
    ];
 
    
}
