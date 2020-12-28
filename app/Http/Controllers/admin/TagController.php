<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTag;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTag $request)
    {
        $create = Tag::create($request->all());
        if ($create) {
            return redirect()->back()->with('success', 'Taq əlavə edildi');
        } else {
            return redirect()->back()->with('error', 'Xəta baş verdi! Taq əlavə edilmədi');
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
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTag $request, $id)
    {
        $update = Tag::find($id);
        $update->update($request->all());
        if ($update) {
            return redirect()->back()->with('success', 'Taq redaktə edildi');
        } else {
            return redirect()->back()->with('error', 'Xəta baş verdi! Taq redaktə edilmədi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if ($tag->posts->count()) {
            return redirect()->back()->with('error', 'Xəta! Bu Taq aid məqalə var.');
        }
        Tag::destroy($id);
        return redirect()->back()->with('success', 'Taq silindi');
    }
}
