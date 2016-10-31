<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityToPost extends Model
{
    protected $table = 'city_to_posts';

    protected $fillable = [
        'city_id', 'post_id',
    ];
}
