@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-4 mb-md-3 mb-lg-0">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <img src="{{ asset('images/user-1.png') }}" alt="" width="150px" class="d-block mx-auto">
                    </div>
                    <h1 class="text-center">{{ $user->first_name . ' ' . $user->last_name }}</h1>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary w-100 mb-3">Edit profile</a>
                    <ul style="list-style-type: none;" class="p-0">
                        <li class="mb-3">
                            <i class="fa-solid fa-envelope"></i>
                            <span class="mx-2">{{ $user->email }}</span>
                        </li>
                        <li class="mb-3">
                            <i class="fa-solid fa-phone"></i>
                            <span class="mx-2">{{ $user->phone_number ?? 'N/A' }}</span>
                        </li>
                        <li class="mb-3">
                            <i class="fa-solid fa-location-dot"></i>
                            <span class="mx-2">{{ $user->address ?? 'N/A' }}</span>
                        </li>
                        <li class="mb-3">
                            <i class="fa-solid fa-map-pin"></i>
                            <span class="mx-2">{{ $user->city ?? 'N/A' }}</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-envelopes-bulk"></i>
                            <span class="mx-2">{{ $user->zip_code ?? 'N/A' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-3">List of bookings</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Room number</th>
                                    <th scope="col">Entry date</th>
                                    <th scope="col">Exit date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bookings as $booking)
                                    <tr>
                                        <th scope="row">{{ $booking->id }}</th>
                                        <td>{{ $booking->room->room_number }}</td>
                                        <td>{{ $booking->entry_date }}</td>
                                        <td>{{ $booking->exit_date }}</td>
                                        <td>
                                            <a href="{{ route('admin.bookings.edit', $booking->id) }}"
                                                class="btn btn-warning btn-sm text-white">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <button type="button" class="btn btn-danger btn-sm text-white"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteBookingModal{{ $booking->id }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                            <div class="modal fade" id="deleteBookingModal{{ $booking->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete the
                                                                booking
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <lord-icon src="https://cdn.lordicon.com/hwjcdycb.json"
                                                                trigger="hover" colors="primary:#d1495b,secondary:#edae49"
                                                                style="width:100%;height:120px">
                                                            </lord-icon>
                                                            <p class="fs-5">Are you sure you want to delete this booking?
                                                            </p>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <form
                                                                action="{{ route('admin.bookings.destroy', $booking->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger text-white">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="5">There is no users available.</td>
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
