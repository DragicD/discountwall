<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input as Input;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request as Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/register/cities';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }
        Auth::guard($this->getGuard())->login($this->create($request->all()));

        return redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validation = [
        /*    'storeName' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'logo' => 'image',
            'website'=> 'url',
            'country' => 'exists:cities',
            'city' => 'exists:cities'*/
        ];
        return Validator::make($data, $validation);
    }

    protected function checkFileAndMove($directory){
        $filename = null;
        if(Input::hasfile('logo')) {
            $file = Input::file('logo');
            //check if file is an image, although we already have image validator, this maybe redundant
            if(substr($file->getMimeType(), 0, 5) == 'image') {
                //removing white spaces and adding time so user cannot have images with same name
                $filename = $name = trim(str_replace(' ', '_', date('Y-m-d H:i:s').$file->getClientOriginalName()));
                //moving file to public/logos folder
                $file->move($directory, $filename);
            }
        }
        return $filename;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $data['logo'] = $this->checkFileAndMove('logos');

        $user = User::create([
            'storeName' => $data['storeName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'storeDescription' => $data['storeDescription'],
            'website' => $data['website'],
            'vat' => $data['vat'],
            'logo' => $data['logo'],
        ]);

        return $user;

    }
}
