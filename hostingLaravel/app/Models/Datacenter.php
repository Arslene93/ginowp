<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datacenter extends Model
{
    use HasFactory;

    protected $table="data_center";
    protected $fillable = ['id'];


    public function pricing()
    {
        return $this->HasMany(Pricing::class);
    }

}
