<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class SiteController extends Controller
{
    public function index()
    {
        return view('home');
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
}
