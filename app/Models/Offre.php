<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'offres';

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
                  'description',
                  'price',
                  'status',
                  'city_id',
                  'city_id_to',
                  'shop_id',
                  'user_id'
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

    /**
     * Get the city for this model.
     */
    public function toCity()
    {
        return $this->belongsTo('App\Models\City','city_id_to');
    }


    /**
     * Get the shop for this model.
     */
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop','shop_id');
    }

    /**
     * Get the user for this model.
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }



}
