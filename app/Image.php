<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Image extends Model
{

    /**
     * get All images with the correspondent gallery
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     *
     */
    public function scopeGetAllWith()
    {
        return $this->with('gallery')->get();

    }

    /**
     * get All images without relation
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
     * Image belongs to one Gallery
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function  gallery()
    {
        return $this->belongsTo('App\Gallery');
    }

}
