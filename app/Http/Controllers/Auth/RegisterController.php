<?php

namespace opStarts\Http\Controllers\Auth;

use Nexmo\Laravel\Facade\Nexmo;
use opStarts\Confirmation;
use opStarts\User;
use Validator;
use opStarts\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '';

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
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|min:8|unique:users,phone_number'
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

        $check = strpos($data['email'], '@');

        $name = substr($data['email'], 0, $check);

        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone_number' => $data['phone'],
            'name' => $name,
        ]);

        $confirmation = new Confirmation();
        $confirmation->user_id = $user->id;
        $confirmation->code = rand(1000, 9999);
        $confirmation->status = 0;
        $confirmation->save();

        Confirmation::send($data['phone'], $confirmation->code);

        return $user;
    }
}
