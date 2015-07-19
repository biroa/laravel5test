<?php

namespace App\Http\Traits;

trait ImageEditor
{

    protected $width, $height;
    /**
     * @var array
     */
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


    public function __construct()
    {
        $default_width = 300;
        $default_height = 200;
        $this->width = empty(env('GALLERY_THUMBNAIL_PATH')) ? $default_width :
            env('GALLERY_THUMBNAIL_PATH');
        $this->height = empty(env('GALLERY_THUMBNAIL_PATH')) ? $default_height :
            env('GALLERY_THUMBNAIL_PATH');

    }

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

    /**
     * @param $id
     * @param $imageName
     */
    public function renameImage($id, $imageName)
    {
        $path = explode('original', $imageName);
        $exchangedPath = $path[0] . 'processed' . $path[1];
        $path_parts = explode('/', $exchangedPath);
        $newFileName = $id . '_' . strtolower($path_parts[count($path_parts) - 1]);
        array_pop($path_parts);
        $path_parts[] = $newFileName;
        $newImgPath = implode('/', $path_parts);

        return $newImgPath;
    }

    /**
     * resize image based on env image settings
     */
    public function resizeAndSaveImage()
    {

    }

    /**
     * Resize and Move the image
     */
    public function reprocessImage($unconfirmedData)
    {
        foreach ( $unconfirmedData as $data ) {
            $data['thumbnail'] = $this->renameImage(
                $data['id'], $data['orig_thumbnail']
            );


        }
        dd('===end===');
    }


}