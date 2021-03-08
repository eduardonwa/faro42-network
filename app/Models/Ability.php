<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $guarded = [];
    
    use HasFactory;

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimeStamps();
    }
}
