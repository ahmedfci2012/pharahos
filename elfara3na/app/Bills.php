<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = 'bills';
    protected $fillable = [
         'customer_id' , 'transport','total_bill_price'
    ];
}
