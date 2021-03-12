<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostsAdminController extends Controller
{

    public function __construct(Post $post) {
        $this->posts = $post;
    }

    public function index()
    {
        $posts = $this->posts->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request)
    {
        $this->posts->create($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $post = $this->posts->find($id);

        return view('admin.posts.edit', compact('post'));
    }

    public function update($id, PostRequest $request)
    {
        $this->posts->find($id)->update($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        $this->posts->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }
}
