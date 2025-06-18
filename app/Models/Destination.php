<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'country',
        'city',
        'activity_type',
        'image',
        'youtube_video',
        'user_id',
    ];
    public function user()             
{
    return $this->belongsTo(User::class);
}

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->where('value', 1)->count();
    }

    public function getDislikesCountAttribute()
    {
        return $this->likes()->where('value', -1)->count();
    }

    public function userHasLiked($userId)
    {
        return $this->likes()->where('user_id', $userId)->where('value', 1)->exists();
    }

    public function userHasDisliked($userId)
    {
        return $this->likes()->where('user_id', $userId)->where('value', -1)->exists();
    }
}