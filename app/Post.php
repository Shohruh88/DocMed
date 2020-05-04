<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'posts';

    public $fillable = [
        'title_uz', 'short_uz', 'content_uz', 
        'title_ru', 'short_ru', 'content_ru', 
        'title_en', 'short_en', 'content_en', 
        'img', 'thumb', 'views', 'id_cat'
    ];
    
    public function scopeMostViews()
    {
        return $this->orderBy('views', 'DESC')->limit(4);
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'id_cat');
    }

    public function translate($attribute)
    {
        $lang = app()->getLocale();

        return $this->getAttribute($attribute.'_'.$lang);
    }
    
}
