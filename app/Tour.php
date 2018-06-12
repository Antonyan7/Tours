<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'img', 'description', 'age', 'availability', 'price', 'departure', 'departure_time', 'return_time', 'included', 'not_included'
    ];

    public function days(){
        return $this->hasManyThrough('App\Day','App\TourDay','tour_id','id','id','day_id');
    }

    public function tourImage(){
        return '/app-files/tours/'. $this->id .'/'. $this->img;
    }

}
