<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'meta_description', 'meta_keywords', 'published', 'created_by', 'modified_by'];
}
