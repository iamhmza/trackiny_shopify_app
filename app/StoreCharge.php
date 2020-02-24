<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreCharge extends Model
{
    protected $guarded = [];

    public function onTrail()
    {
        return  now()->lt($this->train_ends_at);
    }

    public function active()
    {
        return  now()->lt($this->ends_at);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
