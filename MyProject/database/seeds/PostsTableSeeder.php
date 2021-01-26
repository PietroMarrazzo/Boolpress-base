<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // DECOMMENTARE SE NON SI VOGLIONO RIMUOVERE TUTTI I DATI DELLA TABELLA
        Post::truncate();


        // $posts = [
        //     [
        //         'title' => 'lorem',
        //         'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, saepe temporibus fugit blanditiis ad commodi non omnis facilis nisi labore laudantium? Voluptatum, veritatis ad. Maxime rem minima assumenda ut quis?',
        //     ],
        //     [
        //         'title' => 'lorem 2',
        //         'description' => 'Lorem 2, ipsum dolor sit amet consectetur adipisicing elit. Ut, saepe temporibus fugit blanditiis ad commodi non omnis facilis nisi labore laudantium? Voluptatum, veritatis ad. Maxime rem minima assumenda ut quis?',
        //     ],
        //     [
        //         'title' => 'lorem 3',
        //         'description' => 'Lorem 3, ipsum dolor sit amet consectetur adipisicing elit. Ut, saepe temporibus fugit blanditiis ad commodi non omnis facilis nisi labore laudantium? Voluptatum, veritatis ad. Maxime rem minima assumenda ut quis?',
        //     ],
        // ];
        
        for ($i=0; $i < 10; $i++) {
            $title = $faker->text(50);

            $newPost = new Post();

            $newPost->title = $title;
            $newPost->description = $faker->paragraph(2, true);
            $newPost->slug = Str::slug($title, '-');

            $newPost->save();

        }



        // foreach($posts as $post) {
        //     $newPost = new Post();

        //     $newPost->title = $post['title'];
        //     $newPost->description = $post['description'];
        //     $newPost->slug = Str::slug($post['title'], '-');

        //     $newPost->save();
        // } 
    }
}
