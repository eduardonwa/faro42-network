<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function abilities()
    {
        return $this->belongsToMany(Ability::class)->withTimeStamps();
    }

    public function allowTo($ability)
    {
        $this->abilities()->save($ability);
    }
}
