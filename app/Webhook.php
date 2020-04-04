<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webhook extends Model
{

    protected $guarded = [];

    public function store()
    {
        $this->belongsTo('App\Store');
    }
}
