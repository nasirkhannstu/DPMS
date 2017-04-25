<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
    public function login(){
    	return view('auth.login');
    }
    public function postLogin(Request $request){
        try{
            $rememberMe = false;
            if(isset($request->remember_me)){
                $rememberMe = true;
            }
            if (Sentinel::authenticate($request->all(), $rememberMe)) {
                $slug = Sentinel::getUser()->roles()->first()->slug;
                if($slug == 'doctor'){
                    return redirect('/doctor');
                }elseif($slug == 'patient'){
                    return redirect('/patient');
                }elseif($slug == 'store'){
                    return redirect('/pharmacy');
                }
            }else{
                return redirect()->back()->with(['error' => 'Wrong Credentials.']);
            }
        }catch(ThrottlingException $e){
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "You are banned for $delay seconds."]);
        }catch(NotActivatedException $e){
            return redirect()->back()->with(['error' => "Your Account is not activated."]);
        }
        
    	
        
    }
    public function logout(Request $request){
    	Sentinel::logout();
    	return redirect('/login');
    }
}
