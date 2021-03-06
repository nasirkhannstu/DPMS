<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prescription;
use App\Doctor;
use App\User;
use App\Medicine;
use Sentinel;

class PatientController extends Controller
{
    public function index(){
    	$pres = Prescription::where('patient_id', '=', Sentinel::getUser()->id)->get();
    	return view('patient.index')->withPres($pres);
    }
    public function presview($id){
        $pre = Prescription::find($id);
        $medic = $pre->medications;
        $medic = unserialize($medic);

        $med = array();
        foreach($medic as $key => $v){
            $med[] = ['qty'=>$v['qty'], 'remaining'=>$v['remaining'], 'item'=> Medicine::find($v['id'])];
        }
        return view('patient.presview')->withMedics($med)->withId($id);
    }
    public function medicationHistory(){
    	$pres = Prescription::where('patient_id', '=', Sentinel::getUser()->id)->get();
        return view('patient.mdcnhistory')->withPres($pres);
    }
    public function getFindDoctor(){
        $role = Sentinel::findRoleBySlug('doctor');
        $doctors = $role->users()->with('roles')->paginate(10);
        return view('patient.finddoctor')->withDoctors($doctors);
    }
    public function postFindDoctor(Request $request){
    	$key = $request->search;
        $doctors = Doctor::where('speciality','LIKE','%'.$key.'%')->paginate(10);
    	return view('patient.searchDoctor')->withDoctors($doctors);
    }
    public function messageDoctor($id){
    	$user = User::find($id);
    	return view('patient.doctorMessage')->withUser($user);
    }
    public function postMessageDoctor(Request $request, $id){
        //dd($id);
        $this->validate($request, [
            'message' => 'required|min:5|max:1000'
        ]);
    	$pres = new Prescription;
    	$pres->message = $request->message;
    	$pres->doctor_id = $id;
    	$pres->patient_id = $user = Sentinel::getUser()->id;
    	$pres->save();
    	return redirect()->route('getFindDoctor');
    }
}
