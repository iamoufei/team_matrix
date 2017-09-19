<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserProfile;
use SebastianBergmann\Environment\Console;


class StaffController extends Controller
{
    //
    public function index(){
        $staffs = User::with('userProfile')->paginate(10);
        return view('staff',['staffs'=>$staffs]);
    }

    public function update(Request $request){
        $user_id = $request->user_id;
        $level = $request->level;
        $power = $request->power;

        $userProfile = UserProfile::where('user_id', $user_id)->first();
        $userProfile->level = $level;
        $userProfile->power = $power;

        $userProfile->save();

        $update_data = [];
        $update_data['result']='success';
        $update_data['user_id']=$user_id;
        $update_data['level']=$level;
        $update_data['power']=$power;

        return $update_data;
    }
}