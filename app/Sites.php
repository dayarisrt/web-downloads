<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    protected $fillable = [
        'name', 'url','banner','logo','footer','email','telefono','instagram','facebook','twiter','active'
    ];
}
