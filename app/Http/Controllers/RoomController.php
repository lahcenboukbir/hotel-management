<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::with('hotel')->get();
        foreach ($rooms as $room) {
            $room->availability = $room->availability === 1 ? 'Available' : 'Not available';
        }

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::all();
        return view('rooms.create', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_number' => 'required|integer|min:1|unique:rooms,room_number',
            'floor' => 'required|integer',
            'availability' => 'required|boolean',
            'hotel_id' => 'required|exists:hotels,id'
        ]);

        Room::create($validated);

        return redirect()->route('rooms.index')->with('success', 'Room created successfully !');
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
        $room = Room::find($id);
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'room_number' => 'required|integer|min:1|unique:rooms,room_number,' . $id,
            'floor' => 'required|integer',
            'availability' => 'required|boolean'
        ]);

        $room = Room::find($id);
        $room->update($validated);

        return redirect()->route('rooms.edit', $id)->with('success', 'Room updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully !');
    }
}
