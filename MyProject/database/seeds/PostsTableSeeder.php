<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
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
                'title' => 'lorem',
                'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, saepe temporibus fugit blanditiis ad commodi non omnis facilis nisi labore laudantium? Voluptatum, veritatis ad. Maxime rem minima assumenda ut quis?',
            ],
            [
                'title' => 'lorem 2',
                'body' => 'Lorem 2, ipsum dolor sit amet consectetur adipisicing elit. Ut, saepe temporibus fugit blanditiis ad commodi non omnis facilis nisi labore laudantium? Voluptatum, veritatis ad. Maxime rem minima assumenda ut quis?',
            ],
            [
                'title' => 'lorem 3',
                'body' => 'Lorem 3, ipsum dolor sit amet consectetur adipisicing elit. Ut, saepe temporibus fugit blanditiis ad commodi non omnis facilis nisi labore laudantium? Voluptatum, veritatis ad. Maxime rem minima assumenda ut quis?',
            ],
        ];

        foreach($posts as $post) {
            $newPost = new Post();

            $newPost->title = $post['title'];
            $newPost->body = $post['body'];
            // $newPost->slug = Str::slug($post['title'], '-');

            $newPost->save();
        } 
    }
}
