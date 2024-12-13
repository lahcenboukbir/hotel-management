@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-xl-6">
            <div class="card bg-white">
                <div class="card-body">
                    <h3 class="card-title mb-3">Add a room</h3>
                    <form action="{{ route('rooms.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="hotel" class="form-label">Hotel</label>
                            <select name="hotel_id" id="hotel" class="form-select" aria-label="Default select example">
                                <option selected disabled>Select an hotel</option>
                                @foreach ($hotels as $hotel)
                                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="room_number" class="form-label">Room number</label>
                            <input type="number" name="room_number" class="form-control" id="room_number" placeholder="212"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="floor" class="form-label">Floor</label>
                            <input type="number" name="floor" class="form-control" id="floor" placeholder="5"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="availability" class="form-label">Availability</label>
                            <select name="availability" class="form-select" id="availability"
                                aria-label="availability select" required>
                                <option selected disabled>Select room availability</option>
                                <option value="1">Available</option>
                                <option value="0">Not available</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
