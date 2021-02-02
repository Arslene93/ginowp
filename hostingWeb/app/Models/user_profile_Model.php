<?php namespace App\Models;

use CodeIgniter\Model;

class user_profile_Model extends Model
{
    protected $table = 'user_profile';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'type', 'name', 'family_name', 'company_name','piva', 'cf', 'country',
        'state', 'region','street','postal','civico'];
}