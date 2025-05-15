<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RegionApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        return response()->json($regions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'RegionID' => 'required|integer|unique:region,RegionID',
            'RegionDescription' => 'required|string|max:255',
        ]);

        $region = Region::create($validatedData);

        return response()->json([
            'message' => 'Region created successfully',
            'region' => $region
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $region = Region::find($id);

        if ($region) {
            return response()->json($region);
        } else {
            return response()->json([
                'message' => 'Region not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'RegionDescription' => 'required|string|max:255',
        ]);

        try {
            $region = Region::findOrFail($id);
            $region->update($validatedData);

            return response()->json([
                'message' => 'Region updated successfully',
                'region' => $region
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Region not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $region = Region::findOrFail($id);
            $region->delete();

            return response()->json([
                'message' => 'Region deleted successfully'
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Region not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }
}
