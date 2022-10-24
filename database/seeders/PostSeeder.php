<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'name' => 'post1-name',
                'contents' => 'post1-content1',
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'name' => 'post2-name',
                'contents' => 'post2-content1',
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'name' => 'post3-name',
                'contents' => 'post3-content1',
            ],
        ]);

        // Post::factory()
        //     ->count(50)
        //     ->hasPosts(1)
        //     ->create();
    }
}
