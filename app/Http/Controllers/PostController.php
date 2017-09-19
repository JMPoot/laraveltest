<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use Illuminate\Session\Store;

class PostController extends Controller
{
    public function getIndex(Store $session) {
        $post = new Post();
        $posts = $post->getPosts($session);
        return view('blog.index', ['posts' => $posts]);
    }
}
