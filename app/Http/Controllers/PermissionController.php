<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct() {}

    /**
     * Check if a user object has the specified permission
     * @param User $user
     * @param $permission
     * @return bool
     */    
    public function hasPermission(User $user, $permission)
    {
        $data = Permission::where('rank_name', $permission)->firstOrFail()->level;
        //$assigned = explode(';', $data);

        if(in_array($user->rank, $data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Update permission
     * @param $perm_string
     * @param $rid
     */
    public function update($perm_string, $rid)
    {        
        $level = Permission::where('rank_name', $perm_string)->firstOrFail()->level;

        $user = DB::table('users')->where('id', $rid)-update([
            'level' => $level,
        ]);
    }
}
