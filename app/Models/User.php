<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'email',
                  'password',
                  'phone',
                  'avatar',
                  'city_id',
                  'role'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the city for this model.
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City','city_id');
    }



}
