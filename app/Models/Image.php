<?php

namespace App\Models;

use App\Models\Faro;
use App\Models\Tweet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'post_id',
        'tweet_id'
    ];

    public function post()
    {
        return $this->belongsTo(Faro::class);
    }

    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }
}
