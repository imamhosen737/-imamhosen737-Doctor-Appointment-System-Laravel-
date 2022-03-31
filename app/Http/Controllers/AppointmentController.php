<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::get();
        $app = Appointment::get();
        return view('appointment.add_show_appointment', compact('department', 'app'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'patient_name' => 'required',
            'patient_phone' => 'required',
            'total_fee' => 'required',
            'paid_amount' => 'required'
        ]);

        $ap=new Appointment();
        $ap->appointment_no = random_int(100000,999999);
        $ap->appointment_date = $request->appointment_date;
        $ap->doctor_id = $request->doctor_id;
        $ap->patient_name = $request->patient_name;
        $ap->patient_phone = $request->patient_phone;
        $ap->total_fee = $request->total_fee;
        $ap->paid_amount = $request->paid_amount;
        $ap->save();
        return redirect()->route('appointment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Appointment::find($id);
        $delete->delete();
        return redirect()->route('appointment.index');
    }

   
    public function get_drs(Request $r)
    {
        $list = Doctor::where('department_id', $r->id)->get();
        return response()->json($list);
    }
    public function get_dr_fee(Request $r)
    {
        $list = Doctor::find($r->id);
        return response()->json($list);
    }
}
