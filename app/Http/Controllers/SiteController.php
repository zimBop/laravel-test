<?php

namespace App\Http\Controllers;

use App\Page;
use App\News;
use App\Image;

class SiteController extends Controller
{
    public function index()
    {
        return view('home', [
            'page' => Page::where('name', 'home')->first()
        ]);
    }
    
    public function newsList()
    {
        return view('news_list', [
            'news' => News::where('published', 1)->paginate(10)
        ]);
    }
    
    public function news($slug)
    {
        return view('news', [
            'news' => News::where('slug', $slug)
                            ->where('published', 1)
                            ->first()
        ]);
    }
    
    public function gallery()
    {
        return view('gallery', [
            'images' => Image::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
