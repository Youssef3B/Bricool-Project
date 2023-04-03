<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.required' => 'Please enter a password.',
            'password.min' => 'Your password must be at least 8 characters long.',
            'password.confirmed' => 'Your password confirmation does not match.',
        ]);
    }
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        // Your code to store the user goes here

        return redirect('dashboard');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)


    {
        $user = User::where('email', $data['email'])->orWhere('name', $data['name'])->first();
        if ($user) {
            if ($user->email === $data['email']) {
                throw ValidationException::withMessages(['email' => 'Email already exists']);
            } else {
                throw ValidationException::withMessages(['name' => 'User name already exists']);
            }
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'last_name' => $data['last_name'],
            'tele' => $data['tele'],
            'servece' => $data['servece'],
            'city' => $data['city'],
            'dscription' => $data['dscription'],
            'facebook' => $data['facebook'],
            'instagram' => $data['instagram'],
            'linkden' => $data['linkden'],
            'image' => $data['image'],
        ]);
    }
}