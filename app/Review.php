<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
        'name',
        'comment',
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
}
