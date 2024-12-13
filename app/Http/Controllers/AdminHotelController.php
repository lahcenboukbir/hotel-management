<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('admin-hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:hotels,name|max:255',
            'city' => 'required|string|max:255',
            'room' => 'required|integer|min:1',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('images/hotels', 'public');
        }

        Hotel::create($validated);

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel created successfully !');
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
        $hotel = Hotel::find($id);
        return view('admin-hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:hotels,name,' . $id,
            'city' => 'required|string|max:255',
            'room' => 'required|integer|min:1',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $hotel = Hotel::find($id);

        if ($request->hasFile('photo')) {
            if ($hotel->photo && Storage::disk('public')->exists($hotel->photo)) {
                Storage::disk('public')->delete($hotel->photo);
            }

            $validated['photo'] = $request->file('photo')->store('images/hotels', 'public');
        }

        $hotel->update($validated);

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel = Hotel::find($id);
        if ($hotel->photo && Storage::disk('public')->exists($hotel->photo)) {
            Storage::disk('public')->delete($hotel->photo);
        }
        $hotel->delete();
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted successfully !');
    }
}
