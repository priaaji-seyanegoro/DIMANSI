<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    public function category() {
        // 1 post hanya memiliki satu kategoti
        return $this->belongsTo('App\Category');
    }
}
