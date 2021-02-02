<?php namespace App\Models;

use CodeIgniter\Model;

class invoice_Model extends Model
{
    protected $table = 'invoice';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'invoice_id', 'creation_date', 'date_start','date_end','banned'];

}
