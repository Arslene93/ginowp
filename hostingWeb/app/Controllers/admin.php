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

    public function updateUser($id)
    {
        $countries = $this->NazioniModel->asArray()->where(['status'=>'enable'])->findColumn('naz_eng');
        $provinceModel = $this->ProvinceModel->asArray()->findAll();
        $data = $this->user_Model->asArray()->join('user_profile as up','up.user_id = user.id', 'left')->find($id);
    //    var_dump($data["company_name"]);

        return view('admin/updateUser',[
            'countries' => $countries,
            'province' => $provinceModel,
            'data' => $data
        ]);
    }

    public function members()
    {
        return view('admin/members');
    }
}
