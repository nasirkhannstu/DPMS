<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Doctor;
use App\Prescription;
use App\User;
use App\Medicine;
use App\Store;

class PharmacyController extends Controller
{
    public function index(){
        $pres = Prescription::orderBy('id', 'desc')->get();
        return view('pharmacy.index')->withPres($pres);
    }
    public function invoice($id){
        $pre = Prescription::find($id);
        $medic = $pre->medications;
        $medic = unserialize($medic);

        $med = array();
        foreach($medic as $key => $v){
            $item = Store::where('medicine_id', $v['id'])->where('user_id', Sentinel::getUser()->id)->first();
            $medic = Medicine::find($v['id']);
            $med[] = ['qty'=>$v['qty'], 'medicine'=>$medic, 'remaining'=>$v['remaining'], 'item'=> $item];
        }
        return view('pharmacy.invoice')->withMedics($med)->withId($id);
    }
    public function invoiceFull($id){
        $pre = Prescription::find($id);
        $medic = $pre->medications;
        $medic = unserialize($medic);

        $med = array();
        foreach($medic as $key => $v){
            $item = Store::where('medicine_id', $v['id'])->where('user_id', Sentinel::getUser()->id)->first();
            $medic = Medicine::find($v['id']);
            $med[] = ['qty'=>$v['qty'], 'medicine'=>$medic, 'remaining'=>$v['remaining'], 'item'=> $item];
        }
        //dd($med);
        return view('pharmacy.invoicefull')->withMedics($med)->withId($id);
    }
    public function sell(Request $request, $id){
        $this->validate($request, [
            'mdcns.id.*' => 'required|max:255',
            'mdcns.qty.*' => 'required|max:255'
        ]);

        $pre = Prescription::find($id);
        $medic = $pre->medications;
        $medic = unserialize($medic);

        $calculate = array();
        foreach($medic as $key => $v){
            $calculate[] = ['name'=>$v['name'], 'qty'=>$v['qty'], 'remaining'=>$v['remaining'] - $request['mdcns']['qty'][$key], 'id'=>$v['id']];
        }
        //dd($calculate);
        $string = serialize($calculate);
        $pre->medications = $string;
        $pre->save();

        foreach($calculate as $key => $v){
            if($medicine = Store::where('medicine_id', $v['id'])->first()){
                $medicine->qty = $medicine->qty - $request['mdcns']['qty'][$key];
                $medicine->save();  
            }
            
        }
        
        return redirect()->route('pharmacy');
    }
}