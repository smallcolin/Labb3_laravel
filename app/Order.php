<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function products()
    {
        $this->hasMany('App\Product');
    }
    
}
