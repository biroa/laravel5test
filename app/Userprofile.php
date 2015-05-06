<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
    // Mass-assignable fields
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

    /**
     * Get paginated user profiles
     *
     * @param     $query
     * @param int $howMany
     *
     * @return mixed
     */
    public function scopeGetPaginated($query, $howMany = 25)
    {
        return $this->paginate($howMany);

    }

    /**
     * Get one user profile by id
     *
     * @param $query
     * @param $id
     *
     * @return \Illuminate\Support\Collection|null|static
     */
    public function scopeGetOneById($query, $id)
    {
        return $this->find($id);
    }

}
