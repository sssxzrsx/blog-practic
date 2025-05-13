<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image',
        ]);
        $data = $request->all();
        $data['thumbnail'] = Post::uploadImage($request);
        $post = Post::create($data);
        $post->tags()->sync($request->tags);
        return redirect()->route('posts.index')->with('success', 'Статья добавлена');


//        $validatedData = $request->validate([
//            'title'=>'required',
//            'description'=>'required',
//            'content'=>'required',
//            'category_id'=>'required|integer',
//            'yhumbnail'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
//
//        if ($request->hasFile('yhumbnail')) {
//            $folder = date('Y-m-d');
//            $validatedData['yhumbnail'] = $request->file('yhumbnail')->store("{images/$folder}");
//        }
//        $validatedData['views'] = 0;
//        $post = Post::create($validatedData);
//        $validatedData['yhumbnail'] = $post->uploadImage($request->file('yhumbnail'));
//        $post->tags()->sync($request->tags);
//        return to_route('posts.index', $validatedData) -> with('success', 'Статья успешно создана');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'content'=>'required',
            'category_id'=>'required',
            'yhumbnail'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post = Post::find($id);
        $data = $request->all();
        $data['yhumbnail'] = Post::uploadImage($request, $post->yhumbnail);

        $post->update($data);
        $post->tags()->sync($request->tags);
        return to_route('posts.index')->with('success', 'Изменения сохранены');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        $post->tags()->sync([]);
        if ($post->thumbnail && Storage::disk('public')->exists($post->thumbnail)) {
            Storage::disk('public')->delete($post->thumbnail);
        }
        $post->delete();
        return to_route('posts.index')->with('success', 'Статья удалена');
    }
}
