<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vakansii extends Model
{
    public function organization() {
        return $this->hasOne('App\organization');
    }
}
