<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\otp;
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

        if ($user = User::create(['name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone,'password'=>Hash::make($request->password),'user_role'=>$request->user_role])) {
            otp::create(['user_id'=>$user->id,'otp'=>1234]);
            return redirect('otp/'.$user->id);
            // session()->flash('message', 'Invalid credentials');
        }
    }

    public function process_login(Request $request)
    {
        $credentials = array(
            'phone' => $request->phone,
            'password'=>$request->password
            );

        $user = User::where('phone',$request->phone)->first();
        if ($user->status==2||$user->user_role !=="owner") {
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
                    return redirect()->route('admin-dashboard');
                }

            }else{
                session()->flash('message', 'Invalid credentials');
                return redirect()->back();
            }
        }else{
            session()->flash('message', 'Your acoount has not been activated yet!');
            return redirect()->back();
        }
    }
}
