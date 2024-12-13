<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchHotels(Request $request)
    {
        $validated = $request->validate([
            'hotel' => 'required|string|max:255'
        ]);

        $hotels = Hotel::where('name', 'LIKE', '%' . $validated['hotel'] . '%')->get();

        return view('hotels.search', compact('hotels'));
    }

    public function searchRooms(Request $request)
    {
        //
    }
}
