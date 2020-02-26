<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreCharge extends Model
{
    protected $guarded = [];

    public function onTrial()
    {
        return  now()->lt($this->trial_ends_at);
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
