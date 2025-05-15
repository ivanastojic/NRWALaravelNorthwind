<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryApiController extends Controller
{
    /**
     * Prikaz svih kategorija (API)
     */
    public function index()
    {
        $categories = Category::select('CategoryID', 'CategoryName')->get();
        return response()->json($categories);
    }

    /**
     * Spremanje nove kategorije (API)
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'CategoryName' => 'required|string|max:255',
            'Description' => 'nullable|string',
        ]);

        $category = Category::create($validatedData);

        return response()->json([
            'message' => 'Category created successfully',
            'category' => $category
        ], 201);
    }

    /**
     * Prikaz pojedinačne kategorije (API)
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if ($category) {
            return response()->json([
                 'CategoryID' => $category->CategoryID,
                 'CategoryName' => $category->CategoryName,
                 'Description' => mb_convert_encoding($category->Description, 'UTF-8', 'UTF-8'), // ili samo (string)$category->Description
            ]);
        } else {
             return response()->json([
                'message' => 'Category not found'
            ], 404);
        }
    }

    /**
     * Ažuriranje kategorije (API)
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'CategoryName' => 'required|string|max:255',
            'Description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validatedData);

        return response()->json([
            'message' => 'Category updated successfully',
            'category' => $category
        ]);
    }

    /**
     * Brisanje kategorije (API)
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return response()->json(['message' => 'Category deleted successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => '404 not found',
                'description' => $e->getMessage(),
                'code' => $e->getCode()
            ], 404);
        }
    }
}
