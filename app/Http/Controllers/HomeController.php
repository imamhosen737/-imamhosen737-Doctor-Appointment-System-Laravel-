<?php

namespace App\Http\Controllers;

use App\Models\Appointment;

class HomeController extends Controller
{

    public function index()
    {
        $app_data = Appointment::orderBy('id','DESC')->paginate(3);
        return view('home_page',compact('app_data'));
    }

}
