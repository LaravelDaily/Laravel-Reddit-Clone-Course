<?php

namespace App\Observers;

use App\Models\PostVote;

class PostVoteObserver
{
    /**
     * Handle the PostVote "created" event.
     *
     * @param  \App\Models\PostVote  $postVote
     * @return void
     */
    public function created(PostVote $postVote)
    {
        $postVote->post()->increment('votes', $postVote->vote);
    }

}
