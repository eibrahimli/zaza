<?php

namespace App\Http\Controllers\Auth;

use App\Jobs\ResizeUsersImageJob;
use App\User;
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
    protected $redirectTo = '/';

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
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'flName' => ['required','string', 'max:255','min:5'],
            'tel' => ['required', 'numeric', 'min:6'],
            'tip' => ['required'],
            'photo' => ['required','file', 'image', 'mimes:jpg,jpeg,png,svg,gif']
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'flName' => $data['flName'],
            'tel' => $data['tel'],
            'tip' => $data['tip'],
            'level' => 'user',
            'country' => null,
            'city' => null,
            'adress' => null,
            'info' => null,
            'photo' => $data['photo']
        ]);

        $user->update([
            'photo' => $user->photo->store('uploads/users','public')
        ]);

        ResizeUsersImageJob::dispatch($user);

        return $user;
    }
}
