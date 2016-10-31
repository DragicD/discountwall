<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'user_id', 'title','currency_id', 'description', 'titleImage', 'type', 'currentPrice', 'discount', 'duration', 'postUrl', 'filters',
    ];

    public function images() {
        return $this->hasMany("App\PostImage");
    }

    public function currency() {
        return $this->hasOne("App\Currency");
    }

    public function addresses()
    {
        return $this->belongsToMany("App\Address", "post_to_address");
    }

    public function cities()
    {
        return $this->belongsToMany("App\City", "city_to_post");
    }
}
