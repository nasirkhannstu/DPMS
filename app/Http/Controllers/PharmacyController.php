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
        return view('pharmacy.invoice')->withMedics($med);
    }
}
