<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Image extends Model
{

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
