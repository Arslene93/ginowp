<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role', "user")->get();
        return view('admin.index');

    }

    public function create()
    {
        $countries = DB::table('nazioni')->get()->toArray();
        $province = DB::table('province')->get()->toArray();
        return view('admin.newUser', ['countries' => $countries, 'province' => $province]);
    }

    public function store(Request $request)
    {
        $validation =  Validator::make($request->all(), [
            'role'          => "user",
            'email'         => 'required',
            'password'      => 'required',
            'enable'        => 'required',
            'activation'    => 'required',
            'type'        => 'required',
            'name'        => 'required',
            'family_name'        => 'required',
            'company_name'        => 'required',
            'piva'        => 'required',
            'cf'        => 'required',
            'country'        => 'required',
            'state'        => 'required',
            'region'        => 'required',
            'street'        => 'required',
            'postal'        => 'required',
            'civico'        => 'required',


         ]);

        $user = new User();
        $user->role = "user";
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->enable = $request->enable;
        $user->activation = $request->activation;
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
    









