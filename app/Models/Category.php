<?php

namespace App\Models;

use App\Models\Faro;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{   
    protected $table = 'categories';

    use HasFactory;

    public function post()
    {
        return $this->hasMany(Faro::class);
    }

    public function latestPost() 
    {
        return $this->hasOne(Faro::class)->latest();
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::where('id', 'like', '%'.$search.'%')
            ->orWhere('title', 'like', '%'.$search.'%');
    }
}
