<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * get all countries from the database
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function scopeGetAll()
    {
        $countries = Country::all();

        return $countries;
    }

    /**
     * Get one country by id
     *
     * @param $query
     * @param $id
     *
     * @return mixed
     */
    public function scopeGetOneById($query, $id)
    {
        return $query->findOrFail($id);
    }

    /**
     * Get user profile based country
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profiles()
    {
        return $this->belongsTo('App\Userprofile', 'id', 'country_id');
    }

}
