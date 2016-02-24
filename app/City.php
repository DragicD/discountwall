<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public function addresses(){
        return $this->hasOne("App\Address");
    }

    public static function getDataJson(){
        return City::all()->toJson();
    }

    public static function getCountriesJson(){
        return City::select('country')->distinct()->get()->toJson();
    }
}
