<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class StaffController extends Controller
{
    //
    public function index(){
        $staffs = User::with('userProfile')->paginate(10);
        return view('staff',['staffs'=>$staffs]);
    }
}
