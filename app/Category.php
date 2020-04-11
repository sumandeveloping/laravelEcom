<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';  //? changed table name from 'categories' to 'category' because of voyager package(table name collition)
    protected $guarded = [];

    // // many to many relationship with products table
    public function products () {
        return $this->belongsToMany('App\Product');
    }
}