<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicelist extends Model
{
    protected $table= 'servicelists';
    protected $fillable= ['serv_cate_id','title','description','price','duration'];
}
