<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', 
            [
                'news_count' => News::count(),
                'image_count' => 0
            ]
        );
    }
}
