<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Doctor;
use App\Prescription;
use App\User;
use App\Medicine;

class PharmacyController extends Controller
{
    public function index(){
        $pres = Prescription::orderBy('id', 'desc')->get();
    	//dd($pres->prescription());
        return view('pharmacy.index')->withPres($pres);
    }
    public function invoice($id){
        $pre = Prescription::find($id);
        $medic = $pre->medications;
        $medic = unserialize($medic);

        $arr = array();
        foreach($medic as $key => $v){
            $arr[] = $v['id'];
        }
        $medicines = Medicine::whereIn('id', $arr)->get();

        $med = array();
        foreach($medic as $key => $v){
            $med[] = ['qty'=>$v['qty'], 'item'=> Medicine::find($v['id'])];
        }
        //dd($med);
        return view('pharmacy.invoice')->withMedics($med)->withId($id);
    }
    public function sell(Request $request, $id){
        $this->validate($request, [
            'mdcns.id.*' => 'required|max:255',
            'mdcns.qty.*' => 'required|max:255',
            'total' => 'integer|required'
        ]);
        $med = array();
        foreach($request['mdcns']['id'] as $key => $v){
            $med[] = ['qty'=>$request['mdcns']['qty'][$key], 'item'=> Medicine::where('name', "=", $v)->first()];
        }
        //dd($medicine->qty - $v['qty']);
        foreach($med as $key => $v){
            $medicine = Medicine::find($v['item']['id']);
            $medicine->qty = $medicine->qty - $v['qty'];
            $medicine->save();
        }
        
        return redirect()->route('pharmacy');
    }
}