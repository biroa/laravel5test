<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Fillable fields for category. [mass assignment]
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lead',
        'short_lead',
        'description',
        'body',
        'lead_img_src',
        'category_id'
    ];

    /**
     * One Category hasMAny Articles
     * One Article has only one category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    /**
     * Get all categories
     *
     * @return mixed
     */
    public function scopeGetAll()
    {
        $categories = Category::all();

        return $categories;
    }

    /**
     * Get one category by id
     *
     * @param $query
     * @param $id
     *
     * @return mixed
     */
    public function scopeGetOneById($query, $id)
    {
        return $query->findOrFail($id);
    }

    /**
     * get name,id pair list for the SelectBox
     *
     * @return mixed
     */
    public function scopeGetAllSelectable()
    {
        $categories = Category::lists('name', 'id');

        return $categories;
    }

    /**
     * Paginate categories
     *
     * @param     $query
     * @param int $howMany
     *
     * @return mixed
     */
    public function scopeGetPaginated($query, $howMany = 25)
    {
        $categories = Category::paginate($howMany);

        return $categories;
    }

}