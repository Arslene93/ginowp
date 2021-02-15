<?php
namespace App\Controllers;

use App\Models\user_model;

class list_of_users extends BaseController
{



    public function index()
    {
        $users = new user_model();
        $list = $users->select('email,user.id as id_user, up.*')->join('user_profile as up', 'up.user_id = user.id', 'left')->where('role ', $this->request->getVar('role'))->findAll();
        return view('admin/members', ["users" => $list, "role"=>$this->request->getVar('role')]);
    }


    public function delete($id)
    {
    	// dd($id);
    	$user = new user_model();
    	$user->where('id', $id)->delete();
        return redirect()->back();
        
    }


}