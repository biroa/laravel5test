<?php

namespace App\Http\Traits;

use App\Http\Helpers\ImageHelper;

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

    /**
     * @return mixed
     */
    protected function getDefaultImagePath()
    {
        return env('GALLERY_THUMBNAIL_PATH');
    }

    /**
     * @return string
     */
    protected function getOriginalImgPath()
    {
        return $this->getDefaultImagePath() . '/original/img';
    }

    /**
     * @return string
     */
    protected function getProcessedImgPath()
    {
        return $this->getDefaultImagePath() . '/processed/thumbnails';
    }

    /**
     * @return string
     */
    protected function getOriginalThumbnailPath()
    {
        return $this->getDefaultImagePath() . '/original/thumbnails';
    }

    /**
     * @return string
     */
    protected function getProcessedThumbnailPath()
    {
        return $this->getDefaultImagePath() . '/processed/thumbnails';
    }

    /**
     * @param $folderPath
     *
     * @return bool
     */
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
     *
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
     *
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

    public function renameImage($imageName){

    }


    /**
     * Resize and Move the image
     */
    public function resizeImage($unconfimedData){
        foreach($unconfimedData as $data){
            $path = explode('original',$data['orig_thumbnail']);
            $data['thumbnail'] = $path[0] .'processed'. $path[1];
            var_dump($data['thumbnail']);

        }
        dd('===end===');
    }



}