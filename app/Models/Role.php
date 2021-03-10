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
        if(is_string($ability)) {
            $ability = Ability::whereName($ability)->firstOrFail();
        }
        
        $this->abilities()->sync($ability, false);
    }
}
