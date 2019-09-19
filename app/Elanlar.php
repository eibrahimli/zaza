<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elanlar extends Model
{
    protected $fillable = [
        'title', 'price', 'category', 'email', 'info', 'photo', 'type', 'country', 'city', 'adress', 'status', 'name',
        'tel'
    ];

    public function cat() {
        return $this->belongsTo(Category::class,'category');
    }
}
