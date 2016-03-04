<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\City;
use Illuminate\Http\Request;
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

  /*  public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $data['storeName'] = $request->session()->get('storeName');
        $data['email'] = $request->session()->get('email');
        $data['password'] = $request->session()->get('password');
        $data['storeDescription'] = $request->session()->get('storeDescription');
        $data['website'] = $request->session()->get('website');
        $data['vat'] = $request->session()->get('vat');
        $data['logo'] = $request->session()->get('logo');

        //$this->create($data, $request);

        return view('auth.registerCities');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data, Request $request)
    {
        $data['logo'] = null;

        //moving image in folder logos in public/logos

        if($request->session()->get('logo')!==null){
            File::copy('not_finished_reg_logos/'.$request->session()->get('logo'), 'logos/'.$request->session()->get('logo'));
        }
        dd('create die');

        /*$inputs = Input::all();
        foreach($inputs as $key => $input){
            if(strpos($key,'address') !== false){
                $addresses[] = $input;
            }
        }*/

        $user = User::create([
            'storeName' => $data['storeName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'storeDescription' => $data['storeDescription'],
            'website' => $data['website'],
            'vat' => $data['vat'],
            'logo' => $data['logo'],
        ]);

        /*if(Input::get('city') && Input::get('country')){
            $city = City::where('city', '=', Input::get('city'))->firstOrFail();
            foreach($addresses as $address){
                if($address){
                    Address::create([
                        'user_id'=> $user->id,
                        'city_id'=> $city->id,
                        'name'=> $address,
                    ]);
                }
            }
        }*/

        return $user;

    }
}
