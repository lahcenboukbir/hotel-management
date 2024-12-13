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
                <div class="card-header">
                    <a href="{{ route('rooms.create') }}" class="btn btn-success btn-sm text-white">
                        <i class="fa-solid fa-plus"></i>
                        <span class="mx-1">Add rooms</span>
                    </a>
                </div>
                <div class="card-body">
                    <h3 class="card-title mb-3">List of rooms</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Hotel</th>
                                    <th scope="col">Room number</th>
                                    <th scope="col">Floor</th>
                                    <th scope="col">Availability</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rooms as $room)
                                    <tr>
                                        <th scope="row">{{ $room->id }}</th>
                                        <th>{{ $room->hotel->name }}</th>
                                        <td>{{ $room->room_number }}</td>
                                        <td>{{ $room->floor }}</td>
                                        <td>
                                            <span
                                                class="badge text-bg-{{ $room->availability === 'Available' ? 'success' : 'danger' }} text-white p-2">{{ $room->availability }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('rooms.edit', $room->id) }}"
                                                class="btn btn-warning btn-sm text-white">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <button type="button" class="btn btn-danger btn-sm text-white"
                                                data-bs-toggle="modal" data-bs-target="#deleteRoomModal{{ $room->id }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                            <div class="modal fade" id="deleteRoomModal{{ $room->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete the
                                                                room
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <lord-icon src="https://cdn.lordicon.com/hwjcdycb.json"
                                                                trigger="hover" colors="primary:#d1495b,secondary:#edae49"
                                                                style="width:100%;height:120px">
                                                            </lord-icon>
                                                            <p class="fs-5">Are you sure you want to delete this room?</p>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <form action="{{ route('rooms.destroy', $room->id) }}"
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
                                        <td colspan="6">There is no rooms available.</td>
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
