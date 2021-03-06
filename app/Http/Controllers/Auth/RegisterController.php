<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\students;
use App\organization;
use App\educationalInstitution;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            'name' => ['required', 'string', 'max:255'],
            'roleId'=> 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

//        $role = Role::select('id')->where('id', )->first();

        $user->roles()->attach($data['roleId']);

        if($data['roleId'] == 3) {
          students::insert([
            'userId'         => User::max('id'),
            'studentName'    => '',
            'typeOfLearning' => '',
            'progress'       => '',
            'diplom'         => '',
            'portfolio'      => '',
            'yearStart' => date('Y-m-d'),
            'yearGraduation' => date('Y-m-d')
          ]);
        }
        else if ($data['roleId'] == 2) {
          educationalInstitution::insert([
            'userId'            => User::max('id'),
            'educationName'     => '',
            'educationLocation' => ''
          ]);
        }
        else if ($data['roleId'] == 4) {
          organization::insert([
            'userId'         => User::max('id'),
            'name'           => '',
            'address'        => '',
            'phone'          => '',
            'web_site'       => '',
            'specialty'      => ''
          ]);
        }

        return $user;
    }
}
