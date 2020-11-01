<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function process_login(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'password' => 'required'
        // ]);

        //$credentials = $request->except(['_token']);
        $credentials = array(
            'phone' => $request->phone,
            'password'=>$request->password
            );

        $user = User::where('phone',$request->phone)->first();
        file_put_contents('test2.txt',$request->phone);
        if (auth()->attempt($credentials)) {
            //file_put_contents('test.txt',"success");
            if($user->user_role =="renter")
            {
            return redirect()->route('renter-dashboard');
            }
            else if($user->user_role =="owner")
            {
                return redirect()->route('owner-dashboard');
            }
            else if($user->user_role =="admin")
            {
                return redirect()->route('/');
            }

        }else{
            session()->flash('message', 'Invalid credentials');
            //file_put_contents('test.txt',"not_success");
            return redirect()->back();
        }
    }
}
