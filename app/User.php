<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',
    ];

    public static $laracombee = ['name' => 'string'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //Basically creates a relationship between farmer and product
    //A farmer has many products
    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }
    public function carts()
    {
        return $this->hasMany('App\Cart');
    }
    //one-to-many relationship with recommendations
    
}
