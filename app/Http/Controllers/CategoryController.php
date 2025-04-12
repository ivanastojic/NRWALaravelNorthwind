<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Prikaz svih kategorija
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Prikaz forme za kreiranje nove kategorije
    public function create()
    {
        return view('categories.create');
    }

    // Spremanje nove kategorije u bazu
    public function store(Request $request)
    {
        $request->validate([
            'CategoryName' => 'required|max:255',
            'Description' => 'nullable',
        ]);

        Category::create([
            'CategoryName' => $request->CategoryName,
            'Description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    // Prikaz forme za editiranje postojeće kategorije
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // Ažuriranje kategorije
    public function update(Request $request, $id)
    {
        $request->validate([
            'CategoryName' => 'required|max:255',
            'Description' => 'nullable',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'CategoryName' => $request->CategoryName,
            'Description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    // Brisanje kategorije
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
