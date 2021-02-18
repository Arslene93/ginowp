<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role', "user")->get();
        return view('user.index');

    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request) {
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

        public function edit($id)
        {
            $user = User::find($id);
    
            return view('user.edit');

        }


      public function update(Request $request, $id)
    {
    
        $request->validate([

            'role'          => "user",
            'email'         => 'required',
            'password'      => 'required',
            'enable'        => 'required',
            'activation'    => 'required',
            'type'          => 'required',
            'name'          => 'required',
            'family_name'   => 'required',
            'company_name'  => 'required',
            'piva'          => 'required',
            'cf'            => 'required',
            'country'       => 'required',
            'state'         => 'required',
            'region'        => 'required',
            'street'        => 'required',
            'postal'        => 'required',
            'civico'        => 'required',
         ]);
        
    
        $user = User::find($id);


        $user->role = "user";
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->activation = $request->activation;
        $user->enable = $request->enable;
        $user->banned = $request->banned;
        $user->type = $request->type;
        $user->name = $request->name;
        $user->family_name = $request->family_name;
        $user->company_name = $request->company_name;
        $user->piva = $request->piva;
        $user->cf = $request->cf;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->region = $request->region;
        $user->street = $request->street;
        $user->postal = $request->postal;
        $user->civico = $request->civico;
      


        $user->save();
        $user->password=$request->password;


        return redirect()->route('user.index');

        }



        public function destroy($id)
        {         
            $user = User:: where('id' , $id)->delete();
            
             return back();
         }
        }
    









