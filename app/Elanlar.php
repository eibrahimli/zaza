<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Elanlar extends Model
{
    protected $fillable = [
        'title', 'price', 'category', 'email', 'info', 'photo', 'type', 'country', 'city', 'adress', 'status', 'name',
        'tel'
    ];

    public function cat() {
        return $this->belongsTo(Category::class,'category');
    }

    public function eg() {
        return $this->hasMany(ElanlarGalery::class);
    }

    public function path() {
        return url('elan/'.$this->id.'-'.Str::slug($this->title));
    }
}
