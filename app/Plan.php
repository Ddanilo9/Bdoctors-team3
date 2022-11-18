<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function doctors()
    {
        return $this->belongsToMany('App\Doctor')->withPivot('starting_date', 'expiration_date');
    }
}
