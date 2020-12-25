<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostVote extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id', 'vote'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
