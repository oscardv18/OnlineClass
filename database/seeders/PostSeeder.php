<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostType;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostType::create([
            'name_type' => 'Información',
        ]);
        PostType::create([
            'name_type' => 'Evaluación',
        ]);

        Post::factory(60)->create();
    }
}
