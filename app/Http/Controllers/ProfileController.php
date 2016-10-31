<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
    protected function create(Request $request)
    {
        $data = $request;
        //$data['logo'] = $this->checkFileAndMove('logos');

        $post = Post::create([
            'user_id' => Auth::User()->id,
            'title' => $data['title'],
            'currency_id' => '1',
            'description' => $data['description'],
            'titleImage' => 'titleImage',
            'type' => $data['type'],
            'currentPrice' => $data['currentPrice'],
            'discount' => $data['discount'],
            'duration' => $data['duration'],
            'postUrl' => $data['postUrl'],
            'filters' => $data['filters'],
        ]);

        return redirect('/profile');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile')->with('allPosts', Post::all());
    }
}
