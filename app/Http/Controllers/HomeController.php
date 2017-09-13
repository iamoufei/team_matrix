<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function registerConfirm($confirm_code){
        // get the user id with confirm code
        $user_id = Crypt::decryptString($confirm_code);
        // check the user status
        $user_status = UserProfile::where('user_id', $user_id)->first()->status;
        if ($user_status!=null && $user_status === 'active'){
            session()->flush();
            echo 'The account had already active, Please login or enter the system. ';
            echo "<a href='/dashboard'>Go >>></a>";
        }elseif ($user_status!=null && $user_status === 'inactive'){
            session()->flush();
            UserProfile::where('user_id', $user_id)->update(['status'=>'active']);
            echo 'The account had active, now you can use the system, enjoy it! ';
            echo "<a href='/dashboard'>Go >>></a>";
        }else{
            session()->flush();
            echo 'The account is not allow to use, please contact the system administor.';
        }
    }
}
