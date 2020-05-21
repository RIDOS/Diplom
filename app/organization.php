<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class organization extends Model
{
    public function vakansii() {
        return $this->hasMany('App\Vakansii');
    }
}
