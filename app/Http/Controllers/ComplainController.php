<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prescription;
use App\Doctor;
use App\User;
use App\Complain;
use Sentinel;

class ComplainController extends Controller
{
    public function complain($id)
    {
        $doctor = Doctor::find($id);
        return view('complain.create')->withDoctor($doctor);
    }
    public function postcomplain(Request $request,$id)
    {
        $this->validate($request, [
            'complain' => 'required|max:1000'
        ]);

        $complain = new Complain;
        $complain->complain = $request->complain;
        $complain->patient_id = Sentinel::getUser()->id;
        $complain->doctor_id = $id;
        $complain->save();
        return redirect()->route('patient.index')->with(['success' => 'Complain successfully created.']);
    }
}
