<?php

namespace App\Models;

use App\Likeable;
use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tweet extends Model
{

    protected $fillable = [
        'user_id',
        'body'
    ];

    use HasFactory, Likeable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
