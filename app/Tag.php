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

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

}
