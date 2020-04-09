<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];

    // // many to many relationship with categories table
    public function categories () {
        return $this->belongsToMany('App\Category');
    }

    // * local scope
    public function scopeMightAlsoLike ($query) {
        return $query->inRandomOrder()->take(4);
    }

    public function presentPrice() {
        return '$'.number_format($this->price, 2);
    }
    public function presentPriceWithoutSymbol($qty) {
        return '$'.number_format(($this->price * $qty), 2);
        // return gettype(number_format($this->price, 2) * $qty);
    }

}
