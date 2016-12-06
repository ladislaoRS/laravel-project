<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{   
    /**
     * Fillable fields for a flyer
     *
     * @var array
     **/
    protected $fillable = [
        'street',
        'city',
        'zip',
        'country',
        'state',
        'price',
        'description'
    ];

    /**
     * Find the Flyer at a given address
     * @param string  $zip
     * @param string  $street
     * @return Builder
     * @author 
     **/
    public static function locatedAt($zip, $street)
    {
        $street= str_replace('-', ' ', $street);

        return static::where(compact('zip', 'street'))->firstOrFail();

    }

    /**
     * Returns the formatted price
     * @param integer $price
     * @return void
     * @author 
     **/
    public function getPriceAttribute($price)
    {
        return '$' . number_format($price);
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }
    
    /**
     * A Flyer is composed of many photos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author 
     **/
    public function photos()
    {	
    	return $this->hasMany('App\Photo');
    }
}
