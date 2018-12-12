<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gallery.index', [
            'images' => Image::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create', [
            'image' => []
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')) {
            $maxSize = (int)ini_get('upload_max_filesize') * 1024;
            $this->validate($request,[
              'image'=> 'required|image|max:'.$maxSize
            ]);
            
            $imageFile = $request->file('image');
            $path = $imageFile->store('public/images');
            Image::makeThumbnail($path, $imageFile);
            
            Image::create([
                'name' => $request->image->getClientOriginalName(),
                'path' => $path,
                'created_by' => $request->created_by,
            ]);
        }
        
        return redirect()->route('admin.gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        
        $pathParts = pathinfo($image->path);
        Storage::delete([
            $image->path,
            $pathParts['dirname'] . '/thumbnails/' . $pathParts['basename']
        ]);
        $image->delete();

        return redirect()->route('admin.gallery.index');
    }
}
