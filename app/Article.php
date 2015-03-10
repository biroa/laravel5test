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

    //Convert date to Carbon instance
    protected $dates = ['published_at'];

    // mutators
    //setNameAttribute
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    //query Scopes
    public function scopePublished($query){
        $now = Carbon::now()->toDateTimeString();
        $query->where('published_at', '<=', $now);
    }
    //query Scopes
    public function scopeUnpublished($query){
        $now = Carbon::now()->toDateTimeString();
        $query->where('published_at', '>=', $now);
    }

}
