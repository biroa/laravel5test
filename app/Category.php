<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Fillable fields for tag. [mass assignment]
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

}
