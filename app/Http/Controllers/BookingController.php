<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        foreach ($rooms as $room) {
            $room->availability = $room->availability === 1 ? 'Available' : 'Not available';
        }

        return view('bookings.index', compact('rooms'));
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
        $validated = $request->validate([
            'entry_date' => 'required|date|before:exit_date',
            'exit_date' => 'required|date|after:entry_date',
            'room_id' => 'required|exists:rooms,id',
        ]);

        $validated['user_id'] = Auth()->id();

        Booking::create($validated);

        $room = Room::find($validated['room_id']);
        $room->update([
            'availability' => 0
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking has been completed successfully !');
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
