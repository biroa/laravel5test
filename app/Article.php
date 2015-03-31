<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'url',
        'excerpt',
        'body',
        'published_at',
        'category_id'
    ];

    //Convert date to Carbon instance
    protected $dates = [ 'published_at' ];

    protected $charsForTrim = ' \t\n\r\0\x0B';

    /**
     * We modify published_at with carbon parse
     *
     * @param $date
     * mutator
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * We clean the url style
     *
     * @param $url
     * mutator
     */
    public function setUrlAttribute($url)
    {
        $url = strtolower(trim($url, $this->charsForTrim));
        $this->attributes['url'] = str_replace(' ', '-', $url);
    }

    /**
     * @param $query
     *
     *  set query Scopes
     */
    public function scopePublished($query)
    {
        $now = Carbon::now()->toDateTimeString();
        $query->where('published_at', '<=', $now);
    }


    /**
     * @param $query
     *
     * set query Scopes
     */
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
     * @param $date
     *
     * @return mixed
     *
     * New get mutators to provide an instance of carbon
     */
    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
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

    /**
     * @return mixed
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
