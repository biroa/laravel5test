<?php

namespace App\Http\Traits;

use Intervention\Image\ImageManager;

trait ImageEditor
{

    protected $folders =
        [
            'original' => [
                'img',
                'thumbnails'
            ],
            'processed' => [
                'img',
                'thumbnails'
            ]

        ];

    protected function createFolder($folderPath)
    {
        if ( !mkdir($folderPath, 0777, true) ) {
            Log::alert('I could not create the folder');
        }

        return true;
    }

    /**
     * @param array $folderPath
     * @return array
     */
    public function removeLastItemIfEmpty(array $folderPath){
        $lastItem = (int) count($folderPath)-1;
        if(empty ($folderPath[$lastItem])){
            array_pop($folderPath);
        }

        return $folderPath;
    }

    /**
     * @param null $path
     */
    public function createFolderIfNotExists($path = null)
    {
        if ( is_null($path) ) {
            $path = env('GALLERY_THUMBNAIL_PATH');
        }

        $segment = explode('/', $path);
        dd($this->removeLastItemIfEmpty($segment));
//        foreach ( $this->folders as $mainFolder ) {
//            array_push($segments[$i],$mainFolder);
//            array_push($segments[$i],$mainFolder);
//            foreach($mainFolder as $subFolders){
//                array_push($segments[$i],$subFolders);
//                if ( !file_exists($path) ) {
//
//                }
//
//            }
//        }
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