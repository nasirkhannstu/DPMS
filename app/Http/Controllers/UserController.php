<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Doctor;
use App\User;
use App\Information;
use Image;

class UserController extends Controller
{
    public function index(){
    	return view('user.index');
    }
    public function editPatientInfo(){
        $user = Sentinel::getUser()->id;
        $patient = Information::where('user_id', '=', $user)->first();
        if(!isset($patient)){
            $patient = false;
        }
        return view('patient.editinfo')->withPatient($patient);
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
    	$patient = Sentinel::getUser()->id;
    	$this->validate($request, [
    			'gender' => 'required|min:3|max:20',
    			'address' => 'min:3|max:300',
    			'paddress' => 'min:3|max:300',
    			'profession' => 'min:3|max:300',
                'phone' => 'min:3|max:300',
                'nid' => 'min:3|max:300',
    			'age' => 'max:255'
    		]);

    	
    	if(Information::where('user_id',$patient)->first()){
    		$this->update($request);
    		return redirect()->back()->with(['success' => 'Updated Successfully.']);
    	}else{
    		$this->store($request);
    		return redirect()->back()->with(['success' => 'Stored Successfully.']);
    	}
    }
    private function store($request){
        $patient = Sentinel::getUser()->id;

    	$hasInfo = new Information;
    	$hasInfo->user_id = $patient;
    	$hasInfo->gender = $request->gender;
    	$hasInfo->address = $request->address;
    	$hasInfo->paddress = $request->paddress;
    	$hasInfo->profession = $request->profession;
        $hasInfo->phone = $request->phone;
        $hasInfo->nid = $request->nid;
    	$hasInfo->age = $request->age;

        if($request->hasFile('photo')){
           $image = $request->file('photo');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = 'uploads/pp/'. $filename;
           Image::make($image)->resize(400, 400)->save($location);
           $hasInfo->photo = $filename;
        }

    	$hasInfo->save(); 
    }
    private function update($request){
    	$patient = Sentinel::getUser()->id;

    	$hasInfo = Information::where('user_id',$patient)->first();
    	$hasInfo->user_id = $patient;
    	$hasInfo->gender = $request->gender;
    	$hasInfo->address = $request->address;
    	$hasInfo->paddress = $request->paddress;
    	$hasInfo->profession = $request->profession;
        $hasInfo->phone = $request->phone;
        $hasInfo->nid = $request->nid;
    	$hasInfo->age = $request->age;

        if($request->hasFile('photo')){
           $image = $request->file('photo');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = 'uploads/pp/'. $filename;
           Image::make($image)->resize(400, 400)->save($location);
           $hasInfo->photo = $filename;
        }
    	$hasInfo->save();
    }
}
