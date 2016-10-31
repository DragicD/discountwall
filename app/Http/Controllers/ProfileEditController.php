<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileEditController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profileEdit');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validator(array $data)
    {
        $validation = [
            /*    'storeName' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
                'logo' => 'image',
                'website'=> 'url',*/
        ];
        return Validator::make($data, $validation);
    }

    private function checkFileAndMove($directory){
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
     * @param  Request $request
     * @return User
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();

        $user->storeName = $data['storeName'];
        $user->storeDescription = $data['storeDescription'];
        $user->website = $data['website'];
        $user->vat = $data['vat'];

        if ($data && array_key_exists('logo', $data)) {
            $data['logo'] = $this->checkFileAndMove('logos');
            $user->logo = $data['logo'];
        }
        $user->save();
        return view('profileEdit');
    }
}
