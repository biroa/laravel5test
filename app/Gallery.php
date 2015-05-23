<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Gallery extends Model
{

    /**
     * get All galleries with the correspondent images
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function scopeGetAllWith(){
        return $this->with('images')->get();
    }

    /**
     * get All galleries without relations
     *
     * @return mixed
     */
    public function scopeGetAllWithout()
    {
        return $this->get();
    }

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
