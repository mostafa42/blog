<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory , SoftDeletes;

    public $fillable = [
        "title",
        "author", 
        "content",
    ];

    public static $rules = [
        "title" => "required",
        "content" => "required|max:20"
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
}
