<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlaceRequestController extends Controller
{

    public function index()
    {
        $data['city'] = Input::get('city');
        $data['country'] = Input::get('country');

        $this->sendEmailRequest($data);

        return back()->withInput($data);
    }

    private function sendEmailRequest($data)
    {

        Mail::send('emails.placeRequest', ['city' => $data['city'], 'country' => $data['country']], function ($m) use ($data) {
            $m->from('hello@app.com', 'Your Application');

            $m->to('bulutognjen@gmail.com', 'Ognjen Bulut')->subject('Place request');
        });
    }
}
