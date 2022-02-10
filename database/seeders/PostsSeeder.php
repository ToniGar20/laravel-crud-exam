<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title' => 'Post número 1',
                'heading' => 'Este se trata del primer post',
                'body' => 'Contenido del primer post',
                'is_private' => 0,
                'commentable' => 0,
                'expires' => 1,
                'user_id_created_by' => 1
            ],
            [
                'title' => 'Post número 2',
                'heading' => 'Este se trata del segundo post',
                'body' => 'Contenido del segundo post',
                'is_private' => 1,
                'commentable' => 1,
                'expires' => 0,
                'user_id_created_by' => 1
            ]
        ];

        DB::table('posts')->insert($posts);

    }
}
