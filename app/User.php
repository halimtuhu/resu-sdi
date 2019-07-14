<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'position', 'uid', 'phone_number', 'work_locations'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return bool
     */
    public function isAdmin()
    {
        if ($this->role == 'admin') {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isTechnician()
    {
        if ($this->role == 'technician' or $this->role == null) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isTechnisian()
    {
        if ($this->role == 'technician' or $this->role == null) {
            return true;
        }

        return false;
    }

    /**
     * Get technician work locations
     * @return array
     */
    public function getWorkLocations()
    {
        $locations = explode(', ', $this->work_locations);

        return $locations;
    }
}
