<?php namespace App\Models;

use CodeIgniter\Model;

class order_items_Model extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'item_id', 'item_type', 'price_HT','TVA'];

}
