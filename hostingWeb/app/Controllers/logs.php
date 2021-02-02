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
                    'role'=> 'admin',
                    'activation' => '1',
                    'email' => $this->request->getPost('email'),
                    'password' => md5($this->request->getPost('password')),
                ]);
                return 'Successfully admin added' ;
            }
            return $validation->getErrors() ;
        }
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