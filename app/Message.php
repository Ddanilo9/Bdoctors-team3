<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
        'name',
        'email',
        'message',
        'doctor_id'
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
}
