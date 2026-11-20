<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['city', 'photo', 'visit_date', 'trip_id'])]
class Stop extends Model
{
    // uma paragem pertence a uma viagem
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}