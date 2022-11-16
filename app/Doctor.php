<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Doctor extends Model
{
    static public function getUniqueSlugFrom($name, $surname)
    {
        // rigenerare lo slug
        $slug_base = Str::slug($name,$surname);
        $slug = $slug_base;
        $post_esistente = Doctor::where('slug', $slug)->first();
        $counter = 1;

        while ($post_esistente) {

            $slug = $slug_base . '-' . $counter;

            $post_esistente = Doctor::where('slug', $slug)->first();
            $counter++;
        }

        return $slug;
    }
}
