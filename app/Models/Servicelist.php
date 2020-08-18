<?php

namespace App\Models;

use App\Models\Servicecategory;
use Illuminate\Database\Eloquent\Model;

class Servicelist extends Model
{
    protected $table= 'servicelists';
    protected $fillable= ['serv_cate_id','title','description','price','duration'];

    public function service_category()
    {
        return $this->belongsTo(Servicecategory::class, 'serv_cate_id','id');
    }
}
