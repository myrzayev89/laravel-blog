<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required'
        ]);
        $q = $request->q;
        $posts = Post::like($q)->with('category')->paginate(1);
        return view('front.pages.search', compact('posts', 'q'));
    }
}
