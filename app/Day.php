<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        'name',
        'img',
        'description'
    ];

    public function dayImage(){
        $tourId = $this->hasOne('App\TourDay','day_id','id')->first()->tour_id;
        return '/app-files/tours/'. $tourId .'/day-images/'. $this->img;
    }
}
