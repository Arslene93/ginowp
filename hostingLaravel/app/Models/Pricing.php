<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;
    protected $table="pricing";

    protected $fillable = ['id'];
    public $timestamps = false;

    public function datacenter()
    {
        return $this->HasOne(Datacenter::class,'id','id_data_center');
    }

    
        public function product()
        {
            return $this->HasOne(Product::class, 'id_prod');
        }    
    }
