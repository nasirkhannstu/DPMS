<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Doctor;
use App\Prescription;
use App\User;
use App\Medicine;
use App\Store;

class StoreController extends Controller
{
    public function storemedicines(){
        $medicines = Store::where('user_id', Sentinel::getUser()->id)->get();
        $store = array();
        foreach($medicines as $v){
            $store[] = ['id'=>$v->id, 'qty'=>$v->qty, 'item'=> Medicine::find($v->medicine_id)];
        }
        return view('pharmacy.storemedicines')->withStore($store);
    }
    public function storeAdd($id){
        $Store = new Store;
        $Store->user_id = Sentinel::getUser()->id;
        $Store->medicine_id = $id;
        $Store->qty = 0;
        $Store->save();
        return redirect()->route('medicine.index');
    }
    public function storeUpdate(Request $request, $id){

        $Store = Store::find($id);
        $Store->qty = $request->qty;
        $Store->save();
        return redirect()->route('store.medicines');
    }
}