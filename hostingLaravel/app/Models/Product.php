<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{   use SoftDeletes;
    use HasFactory;
    protected $table="product";
    protected $fillable = ['id'];

    public function pricing()
    {
        return $this->HasMany(Pricing::class ,'id_prod');

    }

    public function datacenters()
    {
        return $this->hasManyThrough(Datacenter::class, Pricing::class, 'id_prod'  , 'id' , 'id', 'id_data_center'	);
        
    }





}

