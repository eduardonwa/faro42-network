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

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::where('id', 'like', '%'.$search.'%')
            ->orWhere('title', 'like', '%'.$search.'%');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
