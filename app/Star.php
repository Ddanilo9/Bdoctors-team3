<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{

    protected $fillable = [
        'number'
    ];

    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }
}
