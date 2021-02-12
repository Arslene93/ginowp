<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class datacenterModel extends Model
{
	
    protected $table = 'data_center';
	protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description','status','deleted_at'];
	
    protected $useSoftDeletes = true;

	
	
}