<?php

namespace App;

use App\Models\Permission;
use App\Models\UserPermission;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param string $permission_slug
     * @return bool
     */
    public function checkPermission(string $permission_slug) : bool
    {
        if ($this->is_admin) {
            return true;
        }
        $permission = Permission::query()->where(['slug' => $permission_slug])->first();
        if ($permission) {
            $user_permission = UserPermission::query()
                ->where(['user_id' => $this->id])
                ->where(['permission_id' => $permission->id])
                ->first();
            if ($user_permission) {
                return true;
            }
        }

        return false;
    }
}
