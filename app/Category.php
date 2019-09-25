<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'az_name' , 'ru_name' , 'icon'
    ];

    public function elanlar() {
        return $this->hasMany(Elanlar::class);
    }

    public function path() {
        return url('/kateqoriya/'.$this->id.'-'.Str::slug($this->az_name));
    }
}
