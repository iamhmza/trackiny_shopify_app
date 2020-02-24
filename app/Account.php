<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $guarded = [];

    protected $hidden = ['token', 'expire_time'];

    public function getApiKeyAttribute($value)
    {
        return '_' . substr($value, -13);
    }

    public function getApiSecretAttribute($value)
    {
        return '_' . substr($value, -13);
    }


    /**
     * Get the user that belong to the store.
     */
    public function store()
    {
        return $this->belongsTo('App\Store');
    }
}
