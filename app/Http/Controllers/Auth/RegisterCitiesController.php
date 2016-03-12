<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\City as City;
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
            //'storeName' => 'required|max:255',
            //'email' => 'required|email|max:255|unique:users',
            //'password' => 'required|confirmed|min:6',
            //'logo' => 'image',
            //'website'=> 'url',
            //'country' => 'exists:cities',
            //'city' => 'exists:cities',
            //'address.*.city' => 'required',


        ];

        return Validator::make($data, $validation);
    }

    public function register(Request $request){

        $all = $request->all();
        dd($all);
        foreach($all as $key => $val){
            if($key === 'city'){
                foreach($val as $v){
                    echo $v;
                }
            }
        }
        die;
        $validator = $this->validator($request->all());
        $validator->each('city', ['required']);
        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }

        $data['storeName'] = $request->session()->get('storeName');
        $data['email'] = $request->session()->get('email');
        $data['password'] = $request->session()->get('password');
        $data['storeDescription'] = $request->session()->get('storeDescription');
        $data['website'] = $request->session()->get('website');
        $data['vat'] = $request->session()->get('vat');
        $data['logo'] = $request->session()->get('logo');

        $inputs = Input::all();
        dd($inputs);
        $cities_and_adresses = array();
        $city = null;
        /*foreach($inputs as $key => $input){
            if(strpos($key,'city') !== false){
                $city = $input;
            }

            if(strpos($key,'address') !== false){
                $cities_and_adresses[$city][] = $input;
            }
        }*/
        $this->create($data, $cities_and_adresses);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data, $cities_and_adresses)
    {
        $data['logo'] = null;
        dd('proslo do create');
        //moving image in folder logos in public/logos

        if($data['logo']!==null){
            File::copy('not_finished_reg_logos/'.$data['logo'], 'logos/'.$data['logo']);
        }

        $user = User::create([
            'storeName' => $data['storeName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'storeDescription' => $data['storeDescription'],
            'website' => $data['website'],
            'vat' => $data['vat'],
            'logo' => $data['logo'],
        ]);

        foreach($cities_and_adresses as $key => $addresses){

            $city_name = explode(',',$key)[0];
            $city = City::where('city', '=', $city_name)->firstOrFail();

            foreach($addresses as $address){
                if($address){
                    Address::create([
                        'user_id'=> $user->id,
                        'city_id'=> $city->id,
                        'name'=> $address,
                    ]);
                }
            }
        }

        return $user;

    }
}
