<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategory $request)
    {
        $create = Category::create($request->all());
        if ($create) {
            return redirect()->back()->with('success', 'Bölmə əlavə edildi');
        } else {
            return redirect()->back()->with('error', 'Xəta baş verdi! Bölmə əlavə edilmədi');
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
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategory $request, $id)
    {
        $update = Category::find($id);
        $update->update($request->all());
        if ($update) {
            return redirect()->back()->with('success', 'Bölmə redaktə edildi');
        } else {
            return redirect()->back()->with('error', 'Xəta baş verdi! Bölmə redaktə edilmədi');
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
        $category = Category::find($id);
        if ($category->posts->count()) {
            return redirect()->back()->with('error', 'Xəta! Bu Bölməyə aid məqalə var.');
        }
        Category::destroy($id);
        return redirect()->back()->with('success', 'Bölmə silindi');
    }
}
