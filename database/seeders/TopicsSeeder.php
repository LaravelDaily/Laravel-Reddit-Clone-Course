<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create(['name' => 'Programming']);
        Topic::create(['name' => 'Design']);
        Topic::create(['name' => 'SEO']);
        Topic::create(['name' => 'Business']);
        Topic::create(['name' => 'Random']);
    }
}
