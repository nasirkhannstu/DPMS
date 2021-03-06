<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Doctor;
use App\Prescription;
use App\User;
use App\Information;
use App\Medicine;
use Image;

class DoctorController extends Controller
{
    public function index(){
        $pres = Prescription::where('doctor_id', $user = Sentinel::getUser()->doctor->id)->get();
        return view('doctor.index')->withPres($pres);
    }
    public function doctorPresView($id){
        $pre = Prescription::find($id);
        $medic = $pre->medications;
        $medic = unserialize($medic);

        $med = array();
        foreach($medic as $key => $v){
            $med[] = ['qty'=>$v['qty'], 'remaining'=>$v['remaining'], 'item'=> Medicine::find($v['id'])];
        }
        return view('doctor.presview')->withMedics($med)->withPre($pre);
    }
    public function docPresSearch(Request $request){
        $search = ' ';
        if($request->search){
            return redirect()->route('getDocPresSearch', $request->search);
        }
        return redirect()->route('getDocPresSearch', $search);
    }
    public function getDocPresSearch($s){
        $prescription = array();
        $searchs = Prescription::where('doctor_id', $user = Sentinel::getUser()->doctor->id)->where('id','LIKE','%'.$s.'%')->get();
        foreach($searchs as $search){
            array_push($prescription, $search);
        }
        if($nid = Information::where('nid', $s)->first()){
        $user = User::find($nid->user_id);
        foreach($user->prescription as $pres){
            if($pres->doctor_id == Sentinel::getUser()->doctor->id){
                array_push($prescription, $pres);
            }
        }
        }
        //dd($prescription);
        return view('doctor.pressearch')->withPres($prescription);
    }
    public function messages(){
        $pres = Prescription::where('doctor_id', $user = Sentinel::getUser()->doctor->id)->get();
        return view('doctor.messages')->withPres($pres);
    }
    public function emergency(){
        return view('doctor.emergency');
    }
    public function postEmergency(Request $request){
        //dd($request);
        $this->validate($request, [
                'name' => 'required|max:100',
                'nid' => 'required|integer|min:3',
                'age' => 'required|min:1|integer'
            ]);

        $user = new User;
        $user->first_name = $request->name;
        $user->email = $request->name.'@emergency.com';
        $user->password = bcrypt($request->name);
        $user->save();

        $userinfo = new Information;
        $userinfo->user_id = $user->id;
        $userinfo->nid = $request->nid;
        $userinfo->age = $request->age;
        $userinfo->save();

        return redirect()->route('emergency')->with('success', 'New Patient Created Successfully. #ID = '.$user->id);
    }
    public function profileUpdate(){
    	$user = Sentinel::getUser()->id;
        $doctor = Doctor::where('user_id', '=', $user)->first();
        //dd($doctor);
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
                'workplace' => 'required|min:3|max:300',
    			'vnbc' => 'required|min:3|max:300'
    		]);
    	if(isset($hasInfo)){
    		$this->update($request);
    		return redirect()->back()->with(['success' => 'Profile Information Saved Successfully.']);
    	}else{
    		$this->store($request);
    		return redirect()->back()->with(['success' => 'Profile Information Saved Successfully.']);
    	}
    }    
    public function store($request){
        $doctor = Sentinel::getUser()->id;
        $doctor = Doctor::where('user_id', $doctor)->first();
        $doctor->speciality = $request->speciality;
        $doctor->workplace = $request->workplace;
        $doctor->vnbc = $request->vnbc;

        if($request->hasFile('avatar')){
           $image = $request->file('avatar');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = 'uploads/pp/'. $filename;
           Image::make($image)->save($location);
           $doctor->pp = $filename;
        }
    	$doctor->save();
    }
    public function update($request){
    	$doctor = Sentinel::getUser()->id;

    	$hasInfo = Doctor::find($doctor);
    	$hasInfo->user_id = $doctor;
    	$hasInfo->speciality = $request->speciality;
        $hasInfo->workplace = $request->workplace;
    	$hasInfo->vnbc = $request->vnbc;

        if($request->hasFile('avatar')){
           $image = $request->file('avatar');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = 'uploads/pp/'. $filename;
           Image::make($image)->save($location);
           $hasInfo->pp = $filename;
        }
    	$hasInfo->save();
    }
}