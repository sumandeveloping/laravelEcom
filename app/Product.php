<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];

    public function presentPrice() {
        return '$'.number_format($this->price, 2);
    }

}
