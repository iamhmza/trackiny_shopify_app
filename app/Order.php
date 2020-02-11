<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function store()
    {
        return $this->belongsTo('App\Store');
    }
}
