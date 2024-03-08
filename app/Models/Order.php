<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_name',
        'user_email',
        'price',
        'status',
        'transaction_id',
        'package_type',
    ];


    
    // public function order(){
    //     return $this->belongsTo(Order::class,'user_id');
    // }


}
