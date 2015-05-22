<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Gallery extends Model
{


    /**
     * relation
     *
     * Gallery has many images
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }

}
