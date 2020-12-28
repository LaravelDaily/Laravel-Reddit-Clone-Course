<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\PostVote;
use Livewire\Component;

class PostVotes extends Component
{
    public $post;

    public function mount($postId)
    {
        $this->post = Post::find($postId);
    }

    public function render()
    {
        return view('livewire.post-votes');
    }

    public function vote($vote)
    {
        if (!PostVote::where('post_id', $this->post->id)->where('user_id', auth()->id())->count()
            && in_array($vote, [-1, 1]) && $this->post->user_id != auth()->id()) {
            PostVote::create([
                'post_id' => $this->post->id,
                'user_id' => auth()->id(),
                'vote' => $vote
            ]);

            $this->post = Post::find($this->post->id);
        }
    }
}
