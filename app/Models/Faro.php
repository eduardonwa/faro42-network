<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faro extends Model
{
    protected $fillable = [
        'title', 
        'body',
        'category_id'
    ];

    protected $table = 'faro_posts';

    use HasFactory;

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'post_id');
    }

}
