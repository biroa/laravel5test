<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'published_at'
    ];

    // mutator
    //setNameAttribute
    public function setPublishedAtAttribute($date)
    {
//       $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function scopePublished($query){
        $now = Carbon::now()->toDateTimeString();
        $query->where('published_at', '<=', $now);
    }

}
