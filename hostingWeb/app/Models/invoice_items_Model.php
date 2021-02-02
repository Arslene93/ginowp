<?php namespace App\Models;

use CodeIgniter\Model;

class invoice_items_Model extends Model
{
    protected $table = 'invoice_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['invoice_id', 'item_id', 'item_type', 'price_HT','TVA'];

}

