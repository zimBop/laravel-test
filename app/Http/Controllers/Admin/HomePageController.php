<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class HomePageController extends Controller
{
    public function edit()
    {
        return view('admin.home_page', [
            'page' => Page::where('name', 'home')->first() ?? ''
        ]);
    }
    
    public function store(Request $request)
    {
        $page = Page::where('name', 'home')->first();
        if ($page) {
            $page->content = $request->input('content');
            $page->save();
        } else {
            $page = Page::create($request->all());
        }
        
        return view('admin.home_page', [
            'page' => $page,
            'changed' => 'changed'
        ]);
    }
}
