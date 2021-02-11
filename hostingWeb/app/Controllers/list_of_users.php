<?php
namespace App\Controllers;

use App\Models\user_model;

class list_of_users extends BaseController
{



    public function index()
    {
    	$users = new user_model();
        return view('admin/members', ["users" => $users->select('email, up.*')->join('user_profile as up', 'up.user_id = user.id', 'left')->where('role ', $this->request->getVar('role'))->findAll()]);
    }


    public function delete($id)
    {
    	// dd($id);
    	$user = new user_model();
    	$user->where('id', $id)->delete();
    	return redirect()->back();
    }

}