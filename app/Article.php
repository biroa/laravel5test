<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'published_at',
        'user_id'//Temporary
    ];

    //Convert date to Carbon instance
    protected $dates = [ 'published_at' ];

    // mutators
    //setNameAttribute
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    //query Scopes
    public function scopePublished($query)
    {
        $now = Carbon::now()->toDateTimeString();
        $query->where('published_at', '<=', $now);
    }

    //query Scopes
    public function scopeUnpublished($query)
    {
        $now = Carbon::now()->toDateTimeString();
        $query->where('published_at', '>=', $now);
    }

    /**
     * An article is owned by a user.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * One article belongs To Many Tag
     * One tag belongs To many Articles
     *
     * @return mixed
     */
    public function tag()
    {
        //In many-to-many relationship we have to add the 'withTimestamps'
        //to insert the created and updated flags by default...
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Use it for multiple select as form model binding
     *
     * @return mixed
     */
    public function getTagListAttribute()
    {
        return $this->tag->lists('id');
    }

}
