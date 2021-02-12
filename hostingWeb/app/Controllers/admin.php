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
        $data = $this->user_Model->asArray()->join('user_profile as up','up.user_id = user.id', 'left')->select('up.*, user.*, user.id as id_user')->find($id);
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

    public function update($id)
    {
        $request = $this->request->getVar();
        $this->user_Model->update($id, ["email" => $request["email"], "role" => isset($request["admin"]) ? "admin" : "user"]);
        if (!isset($request['admin'])) {
            $this->user_profile_Model->where('user_id =', $id)->set([
                'type' => isset($request['company']) ? 'company' : 'individual',
                'company_name' => isset($request['company']) ? $request['companyname']:  '',
                'piva' => isset($request['company']) ? $request['piva']:  '',
                'name' => $request['name'],
                'family_name' => $request['familyname'],
                'cf' => isset($request['individual']) ? $request['cf']:  '',
                'country' => $request['country'],
                'state' => $request['province'],
                'region' => $request['region'],
                'street' => $request['street'],
                'civico' => $request['civico'],
                'postal' => $request['postal'],
            ])->update();
        }
        
        return json_encode($request);
    }

    public function newCenter()
    {
        $request = $this->request->getVar();
        $this->datacenterModel->save([   "name"=>$request['name'],
                                         "description" => $request["description"],
                                         "status" => "enabled"]);
    }

    public function newDataCenter()
    {
        return view('admin/newDataCenter');
    }
}
