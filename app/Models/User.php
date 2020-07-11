<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'secret_key',
    ];

    /**
     * Return specific user information from it's user ID
     * Only use this inside template files
     * @param $uid
     * @param $data
     * @return mixed
     */
    public static function fetchInfo($uid, $data)
    {
        if($uid == 0)
        {
            return "Guest";
        }

        else
        {
            $user = User::where('id', $uid)->first();
            return $user->$data;
        }
    }
}
