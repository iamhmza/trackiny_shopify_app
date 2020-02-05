<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'api_key', 'api_secret', 'token', 'store_id', 'expire_time',
    ];

    // protected $hidden = ['token'];

    /**
     * Get the user that belong to the store.
     */
    public function store()
    {
        return $this->belongsTo('App\Store');
    }
}
