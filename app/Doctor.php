<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Doctor extends Model
{
    protected $fillable = [
        'photo',
        'name',
        'surname',
        'address',
        'telephone',
        'services',
        'cv',
        'specializations',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function specializations()
    {
        return $this->belongsToMany('App\Specialization');
    }

    public function stars()
    {
        return $this->belongsToMany('App\Star');
    }

    public function plans()
    {
        return $this->belongsToMany('App\Plan')->withPivot('starting_date', 'expiration_date');
    }

    static public function getUniqueSlugFrom($name, $surname)
    {
        // rigenerare lo slug

        $fullName = $name . ' ' . $surname;

        $slug_base = Str::slug($fullName);
        $slug = $slug_base;
        $doctor = Doctor::where('slug', $slug)->first();
        $counter = 1;

        while ($doctor) {

            $slug = $slug_base . '-' . $counter;

            $doctor = Doctor::where('slug', $slug)->first();
            $counter++;
        }

        return $slug;
    }
}
