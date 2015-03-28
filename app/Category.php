<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Fillable fields for category. [mass assignment]
     * @var array
     */
    protected $fillable = [
        'name',
        'lead',
        'short_lead',
        'description',
        'body',
        'lead_img_src',
    ];

    /**
     * @return mixed
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

}
