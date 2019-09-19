<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElanlarGalery extends Model
{
    protected $table = 'elanlars_gallery';

    protected $fillable = [
        'elanid', 'photo',
    ];
}
