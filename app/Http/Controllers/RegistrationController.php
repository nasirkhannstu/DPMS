<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use Mail;
use App\User;

class RegistrationController extends Controller
{
    public function register(){
    	return view('auth.register');
    }
    public function postRegister(Request $request){
        $type = $request->type;
        $credentials = [
            'email'    => $request->email,
            'first_name'    => $request->first_name,
            'last_name'    => $request->last_name,
            'password'    => $request->password,
            'password_confirmation'    => $request->password_confirmation,
        ];
    	//$user = Sentinel::register($request->all());
    	$user = Sentinel::registerAndActivate($credentials);

    	//$activation = Activation::create($user);

    	$role = Sentinel::findRoleBySlug($type);
    	$role->users()->attach($user);

    	//$this->sendEmail($user, $activation->code);

    	return redirect('/login');
    }
    private function sendEmail($user, $code){
    	Mail::send('email.activation',
    		['user' => $user, 'code' => $code],
    		function($message) use ($user){
    			$message->to($user->email);
    			$message->subject("Hello $user->first_name, activate your account");
    		});
    } 
}
