<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\City as City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input as Input;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class RegisterCitiesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $redirectTo = '/profile';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('auth.registerCities');
    }

    protected function validator(array $data)
    {
        $validation = array();
        /*foreach($data as $key =>$value){
            if(strpos($key,'city') !== false){
                //$validation[$key] = 'exists:cities';
                $validation[$key] = 'required';
            }
        }*/

        $validation = [
            //'country' => 'exists:cities',
            //'city' => 'exists:cities',
            //'address.*.city' => 'required',


        ];

        return Validator::make($data, $validation);
    }

    public function register(Request $request){
        $validator = $this->validator($request->all());
        /*$validator->each('city', ['required']);
        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }*/

        $inputs = $request->all();
        $cities = $inputs['city'];

        Auth::guard($this->getGuard())->login($this->create($cities));
        return redirect($this->redirectTo);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create($cities)
    {
        $user = Auth::user();

        foreach($cities as $city){
            $city_name = explode(',',$city['name'])[0];
            if($city_name){
                $city_object = City::where('city', '=', $city_name)->firstOrFail();
                foreach($city['address'] as $address){
                    if($address){
                        Address::create([
                            'user_id'=> $user->id,
                            'city_id'=> $city_object->id,
                            'name'=> $address,
                        ]);
                    }
                }
            }
        }

        return $user;
    }

    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }
}
