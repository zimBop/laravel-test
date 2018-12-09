<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'meta_description', 'meta_keywords', 'published', 'created_by', 'modified_by', 'slug'];
    
    public static function boot()
    {
        parent::boot();

        static::saving(function ($news) {
            $news->slug = str_slug($news->title);
        });
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
