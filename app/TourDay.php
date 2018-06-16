<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourDay extends Model
{
    protected $table = 'tour_day';

    protected $fillable = [
        'tour_id',
        'day_id'
    ];
}
