<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new \App\Post([
            'title' => 'Welcome',
            'content' => 'Welcome to this blog!'
        ]);
        $post->save();

        $post = new \App\Post([
            'title' => 'Houserules',
            'content' => 'Some of the houserules'
        ]);
        $post->save();
    }
}
