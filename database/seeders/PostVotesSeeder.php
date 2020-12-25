<?php

namespace Database\Seeders;

use App\Models\PostVote;
use Illuminate\Database\Seeder;

class PostVotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostVote::factory()->times(500)->create();
    }
}
