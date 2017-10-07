<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\UserStats;
use App\Inventory;
use App\Storage;

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
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return ValidationValidator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
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

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $storage = Storage::where('id', '=', '1')->select('length')->get();
        foreach ($storage as $idStorage){}
        Inventory::insert([
            'water' => 0,
            'rock' => 0,
            'natural_gas' => 0,
            'crud_oil' => 0,
            'aluminium' => 0,
            'gold' => 0,
            'iron' => 0,
            'copper' => 0,
            'sand' => 0,
            'charcoal' => 0,
            'wood' => 0,
        ]);
        UserStats::insert([
            'user_id' => $user->id,
            'user_storage' => 1,
            'user_inventory' => $user->id,
            'life' => 100,
            'money' => 10,
            'max_inventory' => $idStorage->length,
        ]);

        $this->guard()->login($user);

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }
}
