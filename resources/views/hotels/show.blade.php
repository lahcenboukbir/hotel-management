@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-4 mb-md-3 mb-lg-0">
            <div class="card bg-white">
                <div class="card-body">
                    <img src="{{ asset('storage/' . $hotel->photo) }}" alt="" width="100%" class="rounded mb-md-2">
                    <h1 class="text-center fs-4 text-truncate">{{ $hotel->name }}</h1>
                    <div class="d-flex justify-content-between">
                        <p class="m-0"><i class="fa-solid fa-location-dot"></i> {{ $hotel->city }}</p>
                        <p class="m-0"><i class="fa-solid fa-bed"></i> {{ $hotel->room }} rooms</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-8">
            <div class="card bg-white">
                <div class="card-body">
                    <h3 class="card-title mb-3">List of rooms</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Room number</th>
                                    <th scope="col">Availability</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hotel->rooms as $room)
                                    <tr>
                                        <th scope="row">{{ $room->id }}</th>
                                        <td>{{ $room->room_number }}</td>
                                        <td>
                                            <span
                                                class="badge text-bg-{{ $room->availability === 'Available' ? 'success' : 'danger' }} text-white p-2">{{ $room->availability }}</span>
                                        </td>
                                        <td>
                                            @if ($room->availability == 'Available')
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#bookingModal{{ $room->id }}">
                                                    Book
                                                </button>

                                                <div class="modal fade" id="bookingModal{{ $room->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Book
                                                                    the
                                                                    room number {{ $room->room_number }}
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('bookings.store') }}" method="POST">
                                                                @csrf

                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="entry_date" class="form-label">Start
                                                                            date</label>
                                                                        <input type="date" name="entry_date"
                                                                            class="form-control" id="entry_date">
                                                                    </div>

                                                                    <div>
                                                                        <label for="exit_date" class="form-label">End
                                                                            date</label>
                                                                        <input type="date" name="exit_date"
                                                                            class="form-control" id="exit_date">
                                                                    </div>

                                                                    <div class="d-none">
                                                                        <input type="hidden" name="room_id"
                                                                            value="{{ $room->id }}">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Book</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="btn btn-warning text-white">2024-12-...</div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="4">There is no rooms available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
