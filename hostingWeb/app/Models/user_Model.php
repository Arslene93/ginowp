<?php namespace App\Models;

use CodeIgniter\Model;

class user_Model extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['role', 'email', 'password', 'enable', 'activation', 'banned'];

//    protected
    public function getUser($email)
    {

        return $this->asArray()
            ->where(['email' => $email])
            ->first();
    }


}