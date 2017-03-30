<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Reminder;
use Sentinel;
use Mail;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(){
    	return view('auth.forgotpassword');
    }
    public function postForgotPassword(Request $request){
    	$user = User::whereEmail($request->email)->first();
    	$sentinelUser = Sentinel::findById($user->id);

    	if(count($user) == 0){
    		return redirect()->back()->with(['success' => 'Reset code was sent to your email.']);

    	}
    	$reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);
    	$this->sendEmail($user, $reminder->code);
    	
    	return redirect()->back()->with(['success' => 'Reset code was sent to your email.']);
    }
    public function resetPassword($email, $resetCode){
    	$user = User::whereEmail($email)->first();
    	if(count($user) == 0){
    		abort(404);
    	}
    	$sentinelUser = Sentinel::findById($user->id);
    	if($reminder = Reminder::exists($sentinelUser)){
    		if ($resetCode == $reminder->code) {
    			return view('auth.reset-password');
    		}else{
    			return redirect('/');
    		}
    	}else{
    		return redirect('/');
    	}
    }
    public function postResetPassword(Request $request, $email, $resetCode){
    	$this->validate($request, [
    			'password' => 'confirmed|required|min:5|max:10',
    			'password_confirmation' => 'required|min:5|max:10'
    		]);
    	$user = User::whereEmail($email)->first();
    	if(count($user) == 0){
    		abort(404);
    	}
    	$sentinelUser = Sentinel::findById($user->id);
    	if($reminder = Reminder::exists($sentinelUser)){
    		//dd($request);
    		if ($resetCode == $reminder->code) {
    			Reminder::complete($sentinelUser, $resetCode, $request->password);
    			return redirect('login')->with('success', 'Please login with new password.');
    		}else{
    			return redirect('login')->with('success', 'a.');
    		}
    	}else{
    		return redirect('login')->with('success', 'b.');
    	}
    }
    private function sendEmail($user, $code){
    	Mail::send('email.forgotpassword', ['user'=>  $user, 'code'=> $code],
    		function($message) use ($user){
    			$message->to($user->email);
    			$message->subject("Hello $user->first_name, reset your password");
    	});
    }
}
