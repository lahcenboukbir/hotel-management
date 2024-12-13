@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-xl-6">
            <div class="card bg-white">
                <div class="card-body">
                    <h3 class="card-title mb-3">Edit room number {{ $room->room_number }}</h3>
                    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="room_number" class="form-label">Room number</label>
                            <input name="room_number" type="number"
                                class="form-control @error('room_number') is-invalid @enderror" id="room_number"
                                placeholder="212" value="{{ $room->room_number }}">
                                
                            @error('room_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="floor" class="form-label">Floor</label>
                            <input name="floor" type="number" class="form-control @error('floor') is-invalid @enderror"
                                id="floor" placeholder="5" value="{{ $room->floor }}">

                            @error('floor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="availability" class="form-label">Availability</label>
                            <select name="availability" class="form-select @error('availability') is-invalid @enderror"
                                id="availability">
                                <option value="1" {{ $room->availability === 1 ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ $room->availability === 0 ? 'selected' : '' }}>Not available
                                </option>
                            </select>

                            @error('availability')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Edit</button>
                            <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
