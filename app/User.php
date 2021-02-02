<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;
use App\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function rolesAutorizados($roles) {
        abort_unless($this->tieneAlgunRole($roles), 401);
        return true;
    }

    public function tieneAlgunRole($roles) {
        if (is_array($roles)) {
            foreach($roles as $role) {
                if ($this->tieneRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->tieneRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function tieneRole($role) {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function adminlte_image(){
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc(){
        return $this->belongsToMany(Role::class)->first()->name;
        
    }

    public function adminlte_profile_url(){
        return 'profile/username';
    } 

}
