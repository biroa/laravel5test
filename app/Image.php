<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Image extends Model
{
    /**
     * get All images with the correspondent gallery
     *
     * @return mixed
     */
    public function scopeGetAll(){
        return $this->with('gallery')->get();

    }

    /**
     * relation
     *
     * Image belongs to one Gallery
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function  gallery(){
       return $this->belongsTo('App\Gallery');
    }

}
