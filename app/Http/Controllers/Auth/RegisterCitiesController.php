<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\City;
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
    public function index()
    {
        $store_type = Input::get('store_type');
        dd($store_type);
        return view('home');
    }
}
