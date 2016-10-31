<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostToAddress extends Model
{
    protected $table = 'post_to_address';

    protected $fillable = [
        'address_id', 'post_id',
    ];
}
