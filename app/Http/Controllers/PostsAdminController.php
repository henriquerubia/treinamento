<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
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
        $post = $this->posts->create($request->all());
        $post->tags()->sync($this->getTagsIds($request->tags));

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
        $post = $this->posts->find($id);
        $post->tags()->sync($this->getTagsIds($request->tags));

        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        $this->posts->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }

    private function getTagsIds($tags)
    {
        $tagList = array_filter(array_map('trim',explode(',',$tags)));
        $tagsIDs = [];
    
        foreach($tagList as $tagName){
            $tagsIDs[] = Tag::firstOrCreate(['name'=>$tagName])->id;
        }
        
        return $tagsIDs;
    }
}
