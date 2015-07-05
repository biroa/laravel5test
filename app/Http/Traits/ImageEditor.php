<?php

namespace App\Http\Traits;

use Intervention\Image\ImageManager;

trait ImageEditor
{
    //future folder structure
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
     * Remove the last empty array item if exists
     *
     * @param array $folderPath
     * @return array
     */
    public function removeLastItemIfEmpty(array $folderPath)
    {
        $lastItem = (int)count($folderPath) - 1;
        if ( empty ($folderPath[$lastItem]) ) {
            array_pop($folderPath);
        }

        return $folderPath;
    }

    /**
     * Create the new folder structure
     * @param null $path
     */
    public function createFolderIfNotExists($path = null)
    {
        $segments = [ ];
        if ( is_null($path) ) {
            $path = env('GALLERY_THUMBNAIL_PATH');
        }

        $segment = explode('/', $path);
        $segment = implode('/', $this->removeLastItemIfEmpty($segment));
        foreach ( $this->folders as $mainFolder => $subFolders ) {
            $path = $segment . '/' . $mainFolder;
            foreach ( $subFolders as $subFolders ) {
                $last_segments = $path . '/' . $subFolders;
                if ( !file_exists($last_segments) ) {
                    $this->createFolder($last_segments);
                }

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