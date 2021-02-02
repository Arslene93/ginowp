<?php namespace App\Controllers;

use App\Models\user_Model;
use CodeIgniter\Controller;

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
                echo 'successfully admin added' ;
            }
            echo 'error' ;
        }
    }
}