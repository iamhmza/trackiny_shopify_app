<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //

    protected $fillable = [
        'name', 'domain',
    ];

    /**
     * Get the user that belong to the store.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function account()
    {
        return $this->hasOne('App\Account');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function webhooks()
    {
        return $this->hasMany('App\Webhook');
    }
}
