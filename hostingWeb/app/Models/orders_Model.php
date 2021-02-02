<?php namespace App\Models;

use CodeIgniter\Model;

class orders_Model extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'creation_date', 'creation_date', 'status','price', 'cf', 'billing','banned'];


}