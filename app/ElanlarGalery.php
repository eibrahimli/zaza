<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElanlarGalery extends Model
{
    protected $table = 'elanlars_gallery';

    protected $fillable = [
        'elanlar_id', 'photo',
    ];

    public function elanlar() {
        return $this->belongsTo(Elanlar::class);
    }
}
