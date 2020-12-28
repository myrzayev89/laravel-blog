<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::with('category', 'tags')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        $tags = Tag::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePost $request)
    {
        $data = $request->all();
        $data['thumbnail'] = Post::uploadThumbnail($request);
        $create = Post::create($data);
        $create->tags()->sync($data['tags']);
        if ($create) {
            return redirect()->back()->with('success', 'Məqalə əlavə edildi');
        } else {
            return redirect()->back()->with('error', 'Xəta baş verdi! Məqalə əlavə edilmədi');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('name', 'id')->all();
        $tags = Tag::pluck('name', 'id')->all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StorePost $request, $id)
    {
        $post = Post::find($id);
        $data = $request->all();
        $file = Post::uploadThumbnail($request, $post->thumbnail);
        if ($file) {
            $data['thumbnail'] = $file;
        }
        $post->update($data);
        $post->tags()->sync($data['tags']);
        if ($post) {
            return redirect()->back()->with('success', 'Məqalə redaktə edildi');
        } else {
            return redirect()->back()->with('error', 'Xəta baş verdi! Məqalə redaktə edilmədi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->sync([]);
        Storage::delete($post->thumbnail);
        $post->delete();
        return redirect()->back()->with('success', 'Məqalə silindi');
    }
}
