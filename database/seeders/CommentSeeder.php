<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'id' => 1,
                'post_id' => 1,
                'name' => 'commnet-name1',
                'contents' => 'commnet-content1',
            ],
            [
                'id' => 2,
                'post_id' => 1,
                'name' => 'commnet-name2',
                'contents' => 'commnet-content2',
            ],
            [
                'id' => 3,
                'post_id' => 2,
                'name' => 'commnet-name1',
                'contents' => 'commnet-content3',
            ],
        ]);

    }
}
