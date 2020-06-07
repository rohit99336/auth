<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Dotenv\Result\Success;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\sesion;
use Illuminate\Support\Facades\mail;
use Monolog\Handler\ElasticsearchHandler;
use Sentinel;
use Reminder;


class ClientController extends Controller
{
    //
    public function profile()
    {
        if(session()->get('success'))
        {
            return view("profile");
        }
    }

    public function registration(Request $request)
    {
        if(session()->get("success"))
        {
            return redirect('/');
        }
        $data=new User;
        // return User::all();     //connection testing
        // return $request->all();   //view connection testing
        $this->validate($request,[
            'firstname' => 'required|max:20|nullable',
            'email'=>'email|required|nullable|unique:Users',
            'contry'=>'required',
            'state'=>'required',
            'pin'=>'required|max:6|min:6',
            'password'=>'required|min:6|nullable',
            'conpass'=>'required|min:6|same:password|nullable',
        ],
        [
            'conpass.required'=>'please enter password',
            'password.required'=>'Please Reenter password',
        ]);

        $data->firstname=$request->input('firstname');
        $data->lastname=$request->input('lastname');
        $data->email=$request->input('email');
        $data->contry=$request->input('contry');
        $data->state=$request->input('state');
        $data->block=$request->input('block');
        $data->pin=$request->input('pin');
        $data->password=Hash::make($request->input('password'));
        $sess=$data->save();
        if($sess)
        {
            $request->session()->flash('reg','You are registerd Succesfully');
        }
        return view('login')->with('reg','You are registerd Succesfully');

        // return redirect()->route('login')->with('reg','You are registerd Succesfully');

    }


    public function login(Request $request)
    {

        $email=$request->email;
        $password=$request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $request->session()->put('success',$email);
            return redirect('dashboard');
        }
        else
        {
            $request->session()->flash('reg','Please enter valid email id or password');
            return view('login');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->flush();
        return redirect('/')->with('action','Successfully Logout');

    }

    public function forgetpw(Request $request)
    {
        $data= User::select('email')->get();
        $email=$request->email;
        if($user=User::where("email",$request->input('email'))->first())
        {
            $to_name='rohit Kumar';
            $to_email= $email;
            $data=array('name'=>'Admin','body'=>'you are requested for the new password link -http://localhost:8000/updatepw');
            Mail::send('mail', $data, function ($message) use($to_email,$to_name)
                {
                    $message->from('akash99336@gmail.com', 'rohit');
                    $message->sender('akash99336@gmail.com', 'akash');
                    $message->to($to_email);
                    $message->subject('webtesting mail');
                });

            echo "email has send";
        }
        else
        {
            //return $email;
            // session()->flash('error','You are registerd Succesfully');
            return view('forgetpw');
        }

    }


    public function updatepw(Request $request)
    {

        if($user=User::where("email",$request->input('email'))->first())
        {
            // $data=new User;
            $user=User::where("email",$request->input('email'))->update([
                'password'=>Hash::make($request->input('password'))
            ]);
            return view('login');
        }
        else
        {
            return "your entered wrong email id ";
        }

    }

}
