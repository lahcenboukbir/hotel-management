@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check"></i>
                    <strong class="mx-2">Success</strong> - {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card bg-white">
                <div class="card-body">
                    <h3 class="card-title mb-3">List of bookings</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User</th>
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
                                        <td>{{ $booking->user->first_name . ' ' . $booking->user->last_name }}</td>
                                        <td>{{ $booking->room->room_number }}</td>
                                        <td>{{ $booking->entry_date }}</td>
                                        <td>{{ $booking->exit_date }}</td>
                                        <td>
                                            <a href="#"
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
                                        <td colspan="6">There is no users available.</td>
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
