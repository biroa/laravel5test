<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'updated_at'
    ];

    // mutator
    //setNameAttribute
    public function setUpdatedAtAttribute($date)
    {
//        $this->attributes['updated_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $date);
//       Todo:: I will have to modify this later
         $this->attributes['updated_at'] = Carbon::parse($date);
    }

}
