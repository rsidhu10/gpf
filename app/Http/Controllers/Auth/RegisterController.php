<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mail;
use App\Mail\verifyEmail;
use Session;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('status','User Registered! But verify your Email to Activate your Account');
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verifytoken' => Str::random(40),
        ]);
        $thisUser = User::findOrFail($user->id);
        //dd($thisUser);
        $this->sendEmail($thisUser);
        return $user;
    }

    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));

    }

    public function verifyEmailFirst()
    {
        return view('email.verifyemailfirst');
    }

    public function sendEmailDone($email,$verifyToken)
    {
        $user = User::where(['email'=>$email,'verifytoken'=>$verifyToken])->first();
        if($user)
        {
            User::where(['email'=>$email,'verifytoken'=>$verifyToken])->update(['status'=>'1','verifytoken'=>NULL]);
            Session::flash('status','User Account Activated !!!');
            return redirect(route('login'));
        }else
        {
            Session::flash('status','User Not Found !!!');
            return redirect(route('login'));
        }
        //return $verifyToken;
    }
}
