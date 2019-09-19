<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ayarlar extends Model
{
    protected $fillable = [
        'title','desc', 'keyw','email', 'location', 'tel', 'social','logo'
    ];
}
