<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public function addresses() {
        return $this->hasOne("App\Address");
    }

    public function posts()
    {
        return $this->belongsToMany("App\Post", "city_to_post");
    }

    public static function getDataJson() {
        return City::all()->toJson();
    }

    public static function getCountriesJson() {
        return City::select('country')->distinct()->get()->toJson();
    }
}
