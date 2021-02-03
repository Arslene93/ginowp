<?php namespace App\Controllers;

use App\Models\user_Model;
use CodeIgniter\Controller;
use mysql_xdevapi\Result;

class logs extends BaseController
{

    public function login()
    {
        $user = $this->session->get('user');
        if (!empty($user)) {
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin/dashboard');
            }else
                return redirect()->to('/mypanel/dashboard');
        }
        if ($this->request->getMethod() === 'post') {
            if ($this->validate($this->validation->getRuleGroup('login'))) {
                $email = $this->request->getPost('email');
                $password = md5($this->request->getPost('password'));
                $user = $this->user_Model->getUser($email);
                if (!empty($user) && $user['password'] === $password) {
                    $this->session->set('user', $user);
                    return json_encode(true);
                }
                else
                    return json_encode(false);
            }
            else
                return json_encode(false);
//                return json_encode($this->validation->getErrors());
        }

        // check credentials
        echo view('logs/login');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url(''));
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            if ($this->validate($this->validation->getRuleGroup('admin_registration'))) {
                $this->user_Model->save([
                    'role' => 'admin',
                    'activation' => '1',
                    'email' => $this->request->getPost('email'),
                    'password' => md5($this->request->getPost('password')),
                ]);
                return 'Successfully admin added';
            } else {
                $this->validation->reset();
                if ($this->validate($this->validation->getRuleGroup('company_registration'))) {

                    $this->user_Model->save([
                        'role' => 'user',
                        'activation' => '0',
                        'email' => $this->request->getPost('email'),
                        'password' => md5($this->request->getPost('password')),
                    ]);
                    $user = $this->user_Model->getUser($this->request->getPost('email'));
                    $this->user_profile_Model->save([
                        'user_id' => $user['id'],
                        'type' => 'company',
                        'company_name' => $this->request->getPost('companyname'),
                        'piva' => $this->request->getPost('piva'),
                        'name' => $this->request->getPost('name'),
                        'family_name' => $this->request->getPost('familyname'),
                        'cf' => $this->request->getPost('cf'),
                        'country' => $this->request->getPost('country'),
                        'state' => $this->request->getPost('province'),
                        'region' => $this->request->getPost('region'),
                        'street' => $this->request->getPost('street'),
                        'civico' => $this->request->getPost('civico'),
                        'postal' => $this->request->getPost('postal'),
                    ]);
                    return 'New company added';
                } else {
                    $this->validation->reset();
                    if ($this->validate($this->validation->getRuleGroup('user_registration'))) {

                        $this->user_Model->save([
                            'role' => 'user',
                            'activation' => '0',
                            'email' => $this->request->getPost('email'),
                            'password' => md5($this->request->getPost('password')),
                        ]);
                        $user = $this->user_Model->getUser($this->request->getPost('email'));
                        $this->user_profile_Model->save([
                            'user_id' => $user['id'],
                            'type' => 'individual',
                            'name' => $this->request->getPost('name'),
                            'family_name' => $this->request->getPost('familyname'),
                            'country' => $this->request->getPost('country'),
                            'state' => $this->request->getPost('province'),
                            'region' => $this->request->getPost('region'),
                            'street' => $this->request->getPost('street'),
                            'civico' => $this->request->getPost('civico'),
                            'postal' => $this->request->getPost('postal'),
                        ]);
                        return 'New individual added';
                    }

                }
            }
        }
        return json_encode($this->validation->getErrors());

    }

    public function ajaxProvince()
    {
        $provinceModel = $this->ProvinceModel->asArray()->findAll();

        if ($this->request->getMethod() === 'post' && $_POST['country'] === 'Italy') {
            $result = '<select class="form-control" name="province" id="province">' ;
            foreach ($provinceModel as $item) {
                $result .= '<option value="'.$item['id'].'">'. $item['provincia'].'</option>';
            }
            $result .='</select>' ;
            return $result;
        }
        return '<input type="text" class="form-control" name="province" id="province" placeholder="Province" required/>' ;
    }

    public function ajaxCommuni()
    {
        $province = $_POST['province'];
        $communiModel = $this->ComuniModel->asArray()->where(['id_prov'=>$province])->findAll();
        if ($this->request->getMethod() === 'post') {
            $result = '<select class="form-control" name="region" id="region">' ;
            foreach ($communiModel as $item) {
                $result .= '<option value="'.$item['comune'].'">'. $item['comune'].'</option>';
            }
            $result .='</select>' ;
            return $result;
        }
        return '<input type="text" class="form-control" name="region" id="region" placeholder="Communi" required/>' ;
    }
}