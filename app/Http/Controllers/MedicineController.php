<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicine;
use Session;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::orderBy('id','desc')->paginate(20);
        return view('pharmacy.indexMedicines')->withMedicines($medicines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('pharmacy.createmedicine');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //dd('store');
        $this->validate($request, array(
                'name'          => 'required|max:255|unique:medicines,name',
                'brand'    => 'required|max:255',
                'price'    => 'required|integer'
            ));
        //Store in the database
        $medicine = new Medicine;
        $medicine->name = $request->name;
        $medicine->brand = $request->brand;
        $medicine->price = $request->price;
        $medicine->save();


        Session::flash('success',"The Medicine $medicine->name was successfully saved!");

        //redirect to another page
        return redirect()->route('medicine.show', $medicine->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $medicine = Medicine::find($id);
        return view('pharmacy.showmedicine')->withMedicine($medicine);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $medicine = Medicine::find($id);
        return view('pharmacy.updatemedicine')->withMedicine($medicine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function medicineUpdatemed(Request $request, $id)
    {
        //dd('update'.$id);
        $this->validate($request, array(
                'name'          => "required|max:255|unique:medicines,name,$id",
                'brand'    => 'required|max:255',
                'price'    => 'required|integer'
            ));
        //Store in the database
        $medicine = Medicine::find($id);
        $medicine->name = $request->name;
        $medicine->brand = $request->brand;
        $medicine->price = $request->price;
        $medicine->save();

        Session::flash('success',"The Medicine $medicine->name was successfully Updated!");

        //redirect to another page
        return redirect()->route('medicine.edit', $medicine->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
