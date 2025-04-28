<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request -> validate ([
            'title' => 'required',
            'description'=>'required',
            'content'=>'required',
            'yhumbnail'=>'image | mimes"jpeg, png, jpg, gif, svg | max:2048',
        ]);

        if ($request->hasFile('yhumbnail'))
        {

            $folder = date('Y-m-d');
            $validatedData['yhumbnail'] = $request->file('yhumbnail')->store("{images/$folder}");
            $validatedData['views'] = 0;

            $post = Post::create($validatedData);
            $post->tags()->sync($request->tags);
            return to_route('posts.index', $validatedData) -> with('success', 'Статья успешно созданна');
        }
    }

    public function edit($id)
    {
        return view('admin.posts.edit');
    }

    public function update(Request $request, $id)
    {
        $request -> validate([
            'title' => 'required',
            'description'=>'required',
            'content'=>'required',
            'category_id'=>'required',
            'tags'=>'required',
            'yhumbnail'=>'image | mimes"jpeg, png, jpg, gif, svg | max:2048',
        ]);

        return redirect()->route('posts.index')->with('success', 'Изменения внесенны');
    }

    public function destroy($id)
    {
        return redirect()->route('posts.index')->with('success', 'Статья удаленна');
    }
}
