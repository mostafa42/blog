<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        "post_id", "user_id", "comment"
    ];

    public static $rules = [
        "comment" => "required"
    ];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
