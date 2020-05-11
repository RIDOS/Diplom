<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class organization extends Model
{
    public function vakan() {
        return $this->hasOne('App\Vakansii');
    }
}
