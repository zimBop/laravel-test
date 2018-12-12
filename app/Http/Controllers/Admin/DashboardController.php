<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use App\Image;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', 
            [
                'news_count' => News::count(),
                'image_count' => Image::count()
            ]
        );
    }
}
