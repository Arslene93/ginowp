<?php
namespace App\Controllers;

class mypanel extends BaseController
{
    public function dashboard()
    {
        return view('user/home');
    }
}
