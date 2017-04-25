<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Prescription;
use App\Medicine;

class PrescriptionController extends Controller
{
    public function create(){
    	return view('doctor.prescription');
    }
    public function store(Request $request){
        
    	//$names = $request->name;
    	//$string = serialize($names);
    	//$array = unserialize($string);
        $this->validate($request, [
            'patient_id' => 'integer|required',
            'syntoms' => 'required|max:255',
            'name.*' => 'required|max:255',
            'qty.*' => 'integer|required|numeric',
            'id.*' => 'integer|required|numeric'
        ]);
        $name = $request->name;
        $qty = $request->qty;
        $id = $request->id;
        $medic = array();
        foreach($name as $key => $v){
            $medic[] = ['name'=>$v, 'qty'=>$qty[$key], 'remaining'=>$qty[$key], 'id'=>$id[$key]];
        }
        //dd($medic);
        $string = serialize($medic);
    	$pres = new Prescription;
    	$pres->doctor_id = Sentinel::getUser()->doctor->id;
    	$pres->patient_id = $request->patient_id;
    	$pres->syntoms = $request->syntoms;
    	$pres->medications = $string;
    	$pres->save();

        return redirect()->route('doctor.index')->with(['success' => 'Prescription successfully created.']);
    }
    public function findMedicine(Request $request){
    	// $this->validate($request, [
     //        'name' => 'required|max:255'
     //    ]);

    	$term = $request->term;
    	$data = Medicine::where('name','LIKE','%'.$term.'%')->limit(10)->get();
    	$results = array();
    	foreach($data as $key => $v){
    		$results[] = ['id'=>$v->id, 'value'=>$v->name];
    	}
    	//dd($results);
    	return response()->json($results);
    }
}
