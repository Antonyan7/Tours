<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'img',
    ];

    public function categoryImg(){
        return '/app-files/categories/' . $this->id.'/'. $this->img;
    }
}
