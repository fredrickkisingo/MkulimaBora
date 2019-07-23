<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static $laracombee = ['name' => 'string'];

    // Creating relationship
    // Basically means a product has a relationship with a farmer and belongs to a farmer
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function map()
    {
        return $this->hasMany('App\Map');
    }
}

