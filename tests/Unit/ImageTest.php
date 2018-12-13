<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageTest extends TestCase
{
    /**
     * Test App/Image constructor.
     *
     * @return void
     */
    public function testConstructor()
    {
        $image = new Image([
            'name' => 'test_image.jpeg',
            'path' => 'images/test_image.jpeg'
        ]);
        
        $this->assertEquals('/storage/images/thumbnails/test_image.jpeg', $image->thumbnails_url);
        $this->assertEquals('test_image', $image->file_name);
    }
    
    /**
     * Test image thumbnail creation.
     *
     * @return void
     */
    public function testMakeThumbnail()
    {
        $image = UploadedFile::fake()->image('image.jpg');
        
        Image::makeThumbnail('/public/images/image.jpg', $image);
        
        Storage::assertExists('/public/images/thumbnails/image.jpg');
        
        Storage::delete('/public/images/thumbnails/image.jpg');
    }
}
