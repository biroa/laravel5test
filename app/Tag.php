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

    /*
     *  Tags can belong to more articles
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    /*
     *  get all tags
     */
    public function scopeGetAll(){
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
    public function scopeGetPaginated($query, $howMany = 25){
        return $this->paginate($howMany);
    }
}
