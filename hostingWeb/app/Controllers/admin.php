<?php
namespace App\Controllers;

class admin extends BaseController
{
    public function dashboard()
    {
        $user = $this->session->get('user');
        if (empty($user)){
            return redirect()->to(base_url('Home'));
        }
        return view('admin/home');
    }

    public function newUser()
    {
        $countries = $this->NazioniModel->asArray()->where(['status'=>'enable'])->findColumn('naz_eng');
        $provinceModel = $this->ProvinceModel->asArray()->findAll();

//        var_dump($provinceModel);

        return view('admin/newUser',[
            'countries' => $countries,
            'province' => $provinceModel,
        ]);
    }

    public function members()
    {
        return view('admin/members');
    }
}
