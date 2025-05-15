<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipper;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShipperApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippers = Shipper::all();
        return response()->json($shippers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'CompanyName' => 'required|string|max:255',
            'Phone' => 'nullable|string|max:50',
        ]);

        $shipper = Shipper::create($validatedData);

        return response()->json([
            'message' => 'Shipper created successfully',
            'shipper' => $shipper
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shipper = Shipper::find($id);

        if ($shipper) {
            return response()->json($shipper);
        } else {
            return response()->json([
                'message' => 'Shipper not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'CompanyName' => 'required|string|max:255',
            'Phone' => 'nullable|string|max:50',
        ]);

        $shipper = Shipper::findOrFail($id);
        $shipper->update($validatedData);

        return response()->json([
            'message' => 'Shipper updated successfully',
            'shipper' => $shipper
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $shipper = Shipper::findOrFail($id);
            $shipper->delete();

            return response()->json(['message' => 'Shipper deleted successfully']);
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
