<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as ImageManager;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = ['name', 'path', 'created_by'];
    
    protected $appends = array('url', 'thumbnails_url', 'file_name');

    public function getUrlAttribute()
    {
        return Storage::url($this->path);  
    }
    
    public function getFileNameAttribute()
    {
        return pathinfo($this->name, PATHINFO_FILENAME);  
    }
    
    
    public function getThumbnailsUrlAttribute()
    {
        $imageName = pathinfo($this->path,  PATHINFO_BASENAME);
        
        return Storage::url('public/images/thumbnails/' . $imageName);  
    }
    
    public static function makeThumbnail($path, $imageFile)
    {
        $imageName = pathinfo($path,  PATHINFO_BASENAME);
        
        $image = ImageManager::make($imageFile);
        
        $image->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        });

        Storage::put('public/images/thumbnails/' . $imageName, (string) $image->encode());
    }
}
