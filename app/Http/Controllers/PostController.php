<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use Illuminate\Session\Store;

class PostController extends Controller
{
    public function getIndex(Store $session) {
        $posts = Post::all();
        return view('blog.index', ['posts' => $posts]);
    }

    public function getAdminIndex(Store $session) {
        $posts = Post::all();
        return view('admin.index', ['posts' => $posts]);
    }

    public function getPost(Store $session, $id) {
        $post = Post::find($id);
        return view('blog.post', ['post' => $post]);
    }

    public function getAdminCreate() {
        return view('admin.create');
    }

    public function postAdminCreate(Store $session, Request $request) {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        $post->save();

        return redirect()->route('admin.index')->with('info', 'Post edited, new Title is : '
            . $request->input('title'));
    }

    public function getAdminEdit(Store $session, $id) {
        $post = Post::find($id);
        return view('admin.edit', ['post' => $post, 'postId' => $id]);
    }

    public function postAdminEdit(Store $session, Request $request) {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $post = Post::find($request->input('id'));
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        return redirect()->route('admin.index')->with('info', 'Post edited, new Title is: '
            . $request->input('title'));
    }
}
