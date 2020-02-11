<?php

namespace App;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class transaction extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->BelongsTo('App\Order');
    }
}
