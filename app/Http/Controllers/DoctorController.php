<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Doctor;
use App\Prescription;
use App\User;
use App\Information;

class DoctorController extends Controller
{
    public function index(){
        $pres = Prescription::where('doctor_id', $user = Sentinel::getUser()->id)->whereNotNull('message')->get();
    	//dd($pres->prescription());
        return view('doctor.index')->withPres($pres);
    }
    public function profileUpdate(){
    	$user = Sentinel::getUser()->id;
        $doctor = Doctor::find($user);
    	$docinfo = Information::find($user);
    	if(!isset($doctor)){
    		$doctor = false;
    	}
        if(!isset($docinfo)){
            $docinfo = false;
        }
    	return view('doctor.editinfo')->withDoctor($doctor)->withDocinfo($docinfo);
    }
    public function postInfoUpdate(Request $request){
    	$doctor = Sentinel::getUser()->id;

    	$hasInfo = Doctor::find($doctor);
    	$this->validate($request, [
    			'speciality' => 'required|min:3|max:20',
    			'workplace' => 'required|min:3|max:300'
    		]);
    	if(isset($hasInfo)){
    		$this->update($request);
    		return redirect()->back()->with(['success' => 'Updated Successfully.']);
    	}else{
    		$this->store($request);
    		return redirect()->back()->with(['success' => 'Stored Successfully.']);
    	}
    }    
    public function store($request){
    	$doctor = Sentinel::getUser()->id;

    	$hasInfo = new Doctor;
    	$hasInfo->user_id = $doctor;
    	$hasInfo->speciality = $request->speciality;
    	$hasInfo->workplace = $request->workplace;
    	$hasInfo->save();
    }
    public function update($request){
    	$doctor = Sentinel::getUser()->id;

    	$hasInfo = Doctor::find($doctor);
    	$hasInfo->user_id = $doctor;
    	$hasInfo->speciality = $request->speciality;
    	$hasInfo->workplace = $request->workplace;
    	$hasInfo->save();
    }
}