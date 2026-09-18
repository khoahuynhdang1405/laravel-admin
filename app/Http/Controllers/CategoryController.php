<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),

        ]);
        return redirect()->route('categories.index')->with('message', 'Create new category successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update($id, StoreCategoryRequest $request)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);

        return redirect()->route('categories.index')->with('message', 'Create new category successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back()->with('message', 'Create new category successfully!');
    }

    public function destroyAll()
    {
        Category::query()->delete();
        return back()->with('message', 'Delete all ategory successfully!');
    }
}
