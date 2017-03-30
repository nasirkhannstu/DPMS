<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Doctor;
use App\User;
use App\Information;

class UserController extends Controller
{
    public function index(){
    	return view('user.index');
    }
    public function postAccountUpdate(Request $request){
		//dd($request);
    	$doctor = Sentinel::getUser()->id;
    	$this->validate($request, [
    			'first_name' => 'required|min:3|max:20',
    			'last_name' => 'required|min:3|max:20'
    		]);

    	$user = User::find($doctor);
    	$user->first_name = $request->first_name;
    	$user->last_name = $request->last_name;
    	$user->save();

    	return redirect()->back()->with(['success' => 'Your Info Updated Successfully.']);
    }
    public function postPersonalUpdate(Request $request){
		//dd($request);
    	$doctor = Sentinel::getUser()->id;
    	$this->validate($request, [
    			'gender' => 'required|min:3|max:20',
    			'address' => 'min:3|max:300',
    			'paddress' => 'min:3|max:300',
    			'profession' => 'min:3|max:300',
    			'phone' => 'min:3|max:300',
    			'fb' => 'min:3|max:300',
    			'photo' => 'image'
    		]);

    	$hasInfo = Information::find($doctor);
    	if(isset($hasInfo)){
    		$this->update($request);
    		return redirect()->back()->with(['success' => 'Updated Successfully.']);
    	}else{
    		$this->store($request);
    		return redirect()->back()->with(['success' => 'Stored Successfully.']);
    	}
    }
    private function store($request){
    	$doctor = Sentinel::getUser()->id;

    	$hasInfo = new Information;
    	$hasInfo->user_id = $doctor;
    	$hasInfo->gender = $request->gender;
    	$hasInfo->address = $request->address;
    	$hasInfo->paddress = $request->paddress;
    	$hasInfo->profession = $request->profession;
    	$hasInfo->phone = $request->phone;
    	$hasInfo->fb = $request->fb;
    	$hasInfo->photo = $request->photo;
    	$hasInfo->save();    
    }
    private function update($request){
    	$doctor = Sentinel::getUser()->id;

    	$hasInfo = Information::find($doctor);
    	$hasInfo->user_id = $doctor;
    	$hasInfo->gender = $request->gender;
    	$hasInfo->address = $request->address;
    	$hasInfo->paddress = $request->paddress;
    	$hasInfo->profession = $request->profession;
    	$hasInfo->phone = $request->phone;
    	$hasInfo->fb = $request->fb;
    	$hasInfo->photo = $request->photo;
    	$hasInfo->save();  
    }
}
