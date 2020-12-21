<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\otp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function send_otp($mobile_number)
    {
        //$mobile_number = "01845318609";
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "http://13.250.7.83/exam/api/send_sms",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"msisdn\"\r\n\r\n".$mobile_number."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"msg\"\r\n\r\ntest\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                "postman-token: 24205d22-b04d-11ff-d75e-37564e566b5c"
            ),
            ));

            $response = curl_exec($curl);
            return $response;

    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function process_otp($id)
    {
        $user = User::where('id',$id)->first();
        $otp_request = json_decode($this->send_otp($user->phone));
        $otp = $otp_request->otp;
        if(otp::where('user_id',$user->id)->first())
        {
            otp::where('user_id',$user->id)->update(['otp'=>$otp]);
        }
        else
        {
            otp::create(['user_id'=>$user->id,"otp"=>$otp]);
        }
        return redirect('/otp/'.$user->id);
    }

    public function process_register(Request $request)
    {
        $request->validate([
            'nid' => 'required',
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',
            
        ]);
        $image = time().'.'.request()->user_image->getClientOriginalExtension();
       
        $request->user_image->move(public_path('../user_photos'), $image);
        $user = User::create(['name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone,'nid'=>$request->nid,'password'=>Hash::make($request->password),'user_role'=>$request->user_role,'image'=>$image]);
        if ($user) {
           $this->process_otp($user->id);
           return redirect('/otp/'.$user->id);
        }

    }

    public function process_login(Request $request)
    {
        $credentials = array(
            'phone' => $request->phone,
            'password'=>$request->password
            );

        $user = User::where('phone',$request->phone)->first();
        if ($user) {
            if ($user->status==2||$user->user_role !=="owner") {
                if (auth()->attempt($credentials)) {
                    if($user->user_role =="renter")
                    {
                        // return redirect()->to('apartment-details/1');


                        if(Session::has('apartment_id_for_login'))
                        {
                            $apartment_id = Session::get('apartment_id_for_login');
                            Session::forget('apartment_id_for_login');
                            return redirect()->to('apartment-details/'.$apartment_id);
                        }
                        else{
                           return redirect()->route('renter-dashboard');
                        }

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
        else{
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }
}
