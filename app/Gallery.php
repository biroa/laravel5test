<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    protected $fillable = [
        'name',
        'category_id',
        'thumbnail',
        'lg_width',
        'lg_height',
        'm_width',
        'm_height',
        'sm_width',
        'sm_height',
    ];

    /**
     * get All galleries with the correspondent images
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function scopeGetAllWith()
    {
        return $this->with('images')->with('categories')->get();
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
     * Get all images and gallery data with pagination
     *
     * @param     $query
     * @param int $howMany
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function scopeGetPaginated($query, $howMany = 25)
    {
        return $this->with('images')->with('categories')->paginate($howMany);
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

    public function categories()
    {
        return $this->hasMany('App\Category', 'id', 'category_id');
    }


}
