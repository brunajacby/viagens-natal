<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['destination', 'photo'])]
class Trip extends Model
{
    // uma viagem tem muitas paragens
    public function stops()
    {
        return $this->hasMany(Stop::class);
    }
}