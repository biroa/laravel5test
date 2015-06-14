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
     * Get all images and gallery data with pagination
     *
     * @param     $query
     * @param int $howMany
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function scopeGetPaginated($query, $howMany = 25)
    {
        return $this->with('gallery')->paginate($howMany);
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

    /**
     * Image can have more tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tag()
    {
        //In many-to-many relationship we have to add the 'withTimestamps'
        //to insert the created and updated flags by default...
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
