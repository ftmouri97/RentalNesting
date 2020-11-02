<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function process_register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',
        ]);

        if (User::create(['name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone,'password'=>Hash::make($request->password),'user_role'=>$request->user_role])) {
            return redirect()->route('login');
        }
    }

    public function process_login(Request $request)
    {
        $credentials = array(
            'phone' => $request->phone,
            'password'=>$request->password
            );

        $user = User::where('phone',$request->phone)->first();;
        if (auth()->attempt($credentials)) {
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
            return redirect()->back();
        }
    }
}
