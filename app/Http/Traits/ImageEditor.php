<?php

namespace App\Http\Traits;

use Intervention\Image\ImageManager;

trait ImageEditor{

    public function createFolderIfNotExists()
    {
        $folderPath = env('GALLERY_THUMBNAIL_PATH');
        if ( !file_exists($folderPath) ) {
            if ( !mkdir($folderPath, 0777, true) ) {
                Log::alert('I could not create the folder');
            }
        }

        return true;
    }

    //Todo:: Temporary!! there will be a common resizer
    public function resizeImage($file, $newPath)
    {
        $width = env('GALLERY_THUMBNAIL_WIDTH');
        $height = env('GALLERY_THUMBNAIL_HEIGHT');
        $manager = new ImageManager([ 'driver' => 'imagick' ]);
        $manager->make($file)->resize($width, $height)->save($newPath);

        return true;
    }

}