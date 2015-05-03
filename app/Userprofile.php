<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
    protected $fillable = [
        'country_id',
        'first_name',
        'last_name',
        'gender',
        'contact_email',
        'mobile_phone',
        'address',
        'city',
        'county',
        'state',

    ];

    /**
     * Get all users' profiles
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function scopeGetAll()
    {
        return Userprofile::all();

    }

}
