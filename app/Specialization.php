<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{

    protected $fillable = [
        'spec_name',
    ];

    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }
}
