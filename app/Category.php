<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'az_name' , 'ru_name' , 'icon'
    ];

    public function elanlar() {
        return $this->hasMany(Elanlar::class);
    }
}
