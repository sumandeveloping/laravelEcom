<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];

    // * local scope
    public function scopeMightAlsoLike ($query) {
        return $query->inRandomOrder()->take(4);
    }

    public function presentPrice() {
        return '$'.number_format($this->price, 2);
    }

}
