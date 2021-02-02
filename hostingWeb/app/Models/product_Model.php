<?php namespace App\Models;

use CodeIgniter\Model;

class product_Model extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'price_HT', 'TVA', 'description','status','banned'];

}