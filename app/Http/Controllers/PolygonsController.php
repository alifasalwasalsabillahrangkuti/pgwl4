<?php

namespace App\Http\Controllers;

use App\Models\PolygonsModel;
use Illuminate\Http\Request;

class PolygonsController extends Controller
{

    public function __construct()
    {
        $this->polygons = new PolygonsModel();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // Validate request
                $request->validate(
                    [
                        'name' => 'required|unique:polygons,name',
                        'description' => 'required',
                        'geom_polygon' => 'required',
                    ],
                    [
                        'name.required' => 'Name is required',
                        'name.unique' => 'Name already exists', // Perbaikan: "Name.unique" menjadi "name.unique"
                        'description.required' => 'Description is required',
                        'geom_polygon.required' => 'Geometry polygon is required',
                    ]
                );

                $data = [
                    'geom' => $request->geom_polyline,
                    'name' => $request->name,
                    'description' => $request->description,
                ];

                // Create Data (Perbaikan: Gunakan insert() karena model tidak memiliki fillable)
                if (!$this->polygons->insert($data)) {
                    return redirect()->route('map')->with('error', 'Polygon failed to add'); // Perbaikan: 'Success' menjadi 'error'
                }

                // Redirect to map dengan pesan sukses
                return redirect()->route('map')->with('success', 'Polygon has been added'); // Perbaikan: 'success'.'Point...' salah
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
