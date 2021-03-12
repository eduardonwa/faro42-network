<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Followable;
use App\Models\Role;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'avatar',
        'banner',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        return asset($value ?: '/img/avatar.jpg');
    }

    public function getBannerAttribute($value)
    {
        return asset($value ?: '/img/banner.svg');
    }

    public function timeline()
    {
        $friends = $this->follows()->pluck('id');

            return Tweet::whereIn('user_id', $friends)
                ->orWhere('user_id', $this->id)
                ->withLikes()
                ->latest()
                ->paginate(50);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimeStamps();
    }

    public function assignRole($role)
    {   
        if(is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }
        
        $this->roles()->sync($role, false);
    }

    public function abilities()
    {
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }

    public function faro()
    {
        return $this->hasOne(Faro::class);
    }
}
