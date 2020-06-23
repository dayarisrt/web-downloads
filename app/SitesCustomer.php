<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SitesCustomer extends Model
{
    protected $fillable = [
        'name', 'url','banner','logo','footer','email','telefono','instagram','facebook','twiter','active','user_id','catalog_id','site_id'
    ];
}
