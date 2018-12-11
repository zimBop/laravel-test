<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name', 'content', 'created_by', 'modified_by'];
    
    public static function boot()
    {
        parent::boot();

        static::saving(function ($page) {
            if (!isset($page->created_by)) {
                $page->created_by = $page->modified_by;
            }
            
            $page->content = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $page->content);
        });
    }
    
    protected $attributes = [
        'name' => 'home',
    ];
}
