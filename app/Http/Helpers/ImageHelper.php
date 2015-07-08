<?php namespace App\Http\Helpers;

use Intervention\Image\ImageManager;


class ImageHelper
{


    static function resizeImage($image, $newPath, $x, $y)
    {
        $function = function ($constraint) {
            $constraint->aspectRatio();
        };

        $manager = new ImageManager([ 'driver' => 'imagick' ]);
        //$manager->make($file)->resize($width, $height)->save($newPath);
        if ( $x > 0 ) {
            if ( $y > 0 ) {
                $manager->make($image)->resize($x, $y)->save($newPath);
            } else {
                $manager->make($image)->resize($x, null, $function)->save($newPath);
            }
        } elseif ( $y > 0 ) {
            $manager->make($image)->resize(null, $x, $function)->save($newPath);
        }

        return $image;
    }

    static function cropImage($image, $x, $y, $topx = null, $topy = null)
    {
        //Todo: Crop top left cordinates does not working. i think it's an intervention or laravel problam atm
        //Todo  check back later

        return $image->crop($x, $y, $topx, $topy);
    }
}