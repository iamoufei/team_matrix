<?php

namespace App\Http\Controllers\Auth;

use App\Mail\RegisterConfirm;
use App\User;
use App\UserProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function registered(Request $request, $user)
    {
        $user_id = $user->id;
        $user_name = $user->name;
        // add new data in user profile
        $newProfile = new UserProfile;
        $newProfile->user_id = $user_id;
        $newProfile->save();

        // get this user's profile
        $profile = UserProfile::where('user_id', $user_id)->first();

        // create a confirm url with user id
        $confirm_code = Crypt::encryptString($user_id);
        $confirm_url = "http://team_matrix.dev/confirm_email/" . $confirm_code;

        // send a confirm email with confirm url
//        Mail::to($user->email)->queue(new RegisterConfirm($user_name , $confirm_url));

        return view('email.confirm_register', ['user'=>$user, 'profile'=>$profile]);
    }
}
