<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Fillable fields for tag. [mass assignment]
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * One tag belongs to Many Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    public function images(){
        return $this->belongsToMany('App\Image');
    }

    /**
     * Get all tags
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function scopeGetAll()
    {
        return Tag::All();
    }

    /**
     * Get one tag by id
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
     * Pagination for tags
     *
     * @param     $query
     * @param int $howMany
     *
     * @return mixed
     */
    public function scopeGetPaginated($query, $howMany = 25)
    {
        return $this->paginate($howMany);
    }
}
