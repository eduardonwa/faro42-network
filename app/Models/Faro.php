<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faro extends Model
{
    protected $fillable = ['title', 'body', 'image_url'];

    protected $table = 'faro_posts';

    use HasFactory;

    public function getRouteKeyName()
    {
        return 'post';
    }
}
