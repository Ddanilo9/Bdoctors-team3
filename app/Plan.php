<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'price',
        'type',
        'duration'
    ];

    public function doctors()
    {
        return $this->belongsToMany('App\Doctor')->withPivot('starting_date', 'expiration_date');
    }
}
