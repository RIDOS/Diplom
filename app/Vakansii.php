<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vakansii extends Model
{
    public function organization() {
        return $this->belongTo('App\organization');
    }
}
