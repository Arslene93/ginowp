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

    public function store(Request $request)
    {
        $validation =  Validator::make($request->all(), [
            'role'          => "user",
            'email'         => 'required',
            'password'      => 'required',
            'enable'        => 'required',
            'activation'    => 'required',
            'banned'        => 'required',
         ]);

        $user = new User();
        $user->role = "user";
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->enable = $request->enable;
        $user->activation = $request->activation;
        $user->banned = $request->banned;
        $user->save();
        $user->password=$request->password;

        return redirect()->route('user.index');

        }



        public function update(Request $request, $id)
    {
        $validation =  Validator::make($request->all(), [
            'role'          => "user",
            'email'         => 'required',
            'password'      => 'required',
            'enable'        => 'required',
            'activation'    => 'required',
            'banned'        => 'required',
         ]);
        
    
        $user = User::find($id);


        $user->role = "user";
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->activation = $request->activation;
        $user->enable = $request->enable;
        $user->banned = $request->banned;


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
    









