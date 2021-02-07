<?php namespace App\Controllers;

class list_of_users extends BaseController
{

    public function index()
    {
        return redirect()->to('https://preview.keenthemes.com/metronic/theme/html/tools/preview/api/?file=datatables/datasource/default.json');
    }

}