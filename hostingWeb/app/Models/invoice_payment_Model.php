<?php namespace App\Models;

use CodeIgniter\Model;

class invoice_payment_Model extends Model
{
    protected $table = 'invoice_payment';
    protected $primaryKey = 'id';
    protected $allowedFields = ['invoice_id', 'transaction_num', 'price', 'status','payment_date','payment_method'];

}