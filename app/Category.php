<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'az_name' , 'ru_name' , 'icon', 'top_category'
    ];

    public function elan() {
        return $this->hasMany(Elanlar::class,'category');
    }

    public function categories()
    {
        return $this->hasMany(Category::class,'category_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class,'category_id');
    }


    public function path() {
        return url('/kateqoriya/'.$this->id.'-'.Str::slug($this->az_name));
    }
}
