<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'category';

    protected $fillable = [
        'name',
        'slug'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'id_cat', 'id');
    }

}
