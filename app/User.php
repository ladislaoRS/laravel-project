<?php

namespace App;

use App\Flyer;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function owns($relation)
    {
        return $relation->user_id == $this->id;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function flyers()
    {
        return $this->hasMany(Flyer::class);
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function publish(Flyer $flyer)
    {
        return $this->flyers()->save($flyer);
    }
}
