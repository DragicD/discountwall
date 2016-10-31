<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'user_id', 'city_id', 'name', 'lat', 'lng'
    ];

    public function posts()
    {
        return $this->belongsToMany("App\Post", "post_to_address");
    }

}
