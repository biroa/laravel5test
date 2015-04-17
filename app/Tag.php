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
    public function scopeConvertReceivedObj($obj)
    {
        return $query->findOrFail($id);
    }
}
