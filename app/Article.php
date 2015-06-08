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

    //Rules for trim
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
     *
     */
    public function setUrlAttribute($url)
    {
        $url = strtolower(trim($url, $this->charsForTrim));
        $this->attributes['url'] = str_replace(' ', '-', $url);
    }

    /**
     * get already published Articles
     *
     * @param $query
     *
     */
    public function scopePublished($query)
    {
        $now = Carbon::now()->toDateTimeString();
        $query->where('published_at', '<=', $now);
    }


    /**
     * get still unpublished Articles
     *
     * @param $query
     *
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
     *
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * convert $date param to a Carbon instance
     *
     * @param $date
     *
     * @return mixed
     *
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
     * One Category belongs to Many Article
     * One Article has one category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
//        return $this->belongsTo('App\Category');
        return $this->morphMany('Category', 'categorizable');
    }


    /**
     * Get all article for public and restricted with relations
     *
     * @return mixed
     */
    public function scopeGetAll()
    {
        $now = Carbon::now()->toDateTimeString();
        $articles = Article::latest('published_at')->published()->with('tag')->with('category')->get();

        return $articles;
    }

    /**
     * Paginate articles
     *
     * @param     $query
     * @param int $howMany
     *
     * @return mixed
     */
    public function scopeGetPaginated($query, $howMany = 25)
    {
        $now = Carbon::now()->toDateTimeString();
        $articles = Article::latest('published_at')->published()->with('tag')->with('category')->paginate($howMany);

        return $articles;
    }

    /**
     * Get the specific article based on the url
     *
     * @param $query
     * @param $text
     *
     * @return mixed
     */
    public function scopeGetOneByName($query, $text)
    {
        $articles = $query->where('url', '=', $text)->with('tag')->with('category')->get()->toArray();

        return $articles;
    }

}
