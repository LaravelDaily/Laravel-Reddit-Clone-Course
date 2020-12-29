<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\PostVote;
use Livewire\Component;

class PostVotes extends Component
{
    public $post;
    public $sumVotes;

    public function mount($post)
    {
        $this->post = $post;
        $this->sumVotes = $post->votes;
    }

    public function render()
    {
        return view('livewire.post-votes');
    }

    public function vote($vote)
    {
        if (!$this->post->postVotes->where('user_id', auth()->id())->count()
            && in_array($vote, [-1, 1]) && $this->post->user_id != auth()->id()) {
            PostVote::create([
                'post_id' => $this->post->id,
                'user_id' => auth()->id(),
                'vote' => $vote
            ]);

            $this->sumVotes += $vote;
        }
    }
}
