<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Likeable;

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
}
