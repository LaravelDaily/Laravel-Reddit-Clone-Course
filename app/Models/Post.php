<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['community_id', 'user_id', 'title', 'post_text', 'post_image', 'post_url', 'votes'];

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function postVotes()
    {
        return $this->hasMany(PostVote::class);
    }

    public function votesThisWeek()
    {
        return $this->hasMany(PostVote::class)
            ->where('post_votes.created_at', '>=', now()->subDays(7));
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
}
