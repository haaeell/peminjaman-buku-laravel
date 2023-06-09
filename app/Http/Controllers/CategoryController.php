<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{ // ...

    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
    ], [
        'name.required' => 'Nama tidak boleh kosong.',
    ]);

    Category::create($request->all());

    return redirect()->route('categories.index')
        ->with('success', 'Category created successfully.');
}


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong.',
        ]);

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->color = $request->input('color');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        if ($category->books()->exists()) {
            return redirect()->route('categories.index')->with('error', 'Tidak dapat menghapus kategori karena terdapat buku terkait.');;
        }
        
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }

// ...

}
