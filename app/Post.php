<?php

namespace App;

use Illuminate\Support\Facades\Session;

class Post {
    public function getPost($session) {
        if(!$session->has('posts')) {
            $this->createDummyData($session);
        }
        return $session->get('posts');
    }

    private function createDummyData($session) {
        $posts = [
            [
                'title' => 'Learning Laravel',
                'content' => 'This blog post will get you right on track with Laravel!'
            ],
            [
                'title' => 'Something else',
                'content' => 'Some other content'
            ]
        ];
        $session->put('posts', $posts);
    }
}