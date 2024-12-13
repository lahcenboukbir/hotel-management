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
                    <a href="{{ route('admin.hotels.create') }}" class="btn btn-success btn-sm text-white">
                        <i class="fa-solid fa-plus"></i>
                        <span class="mx-1">Add hotels</span>
                    </a>
                </div>
                <div class="card-body">
                    <h3 class="card-title mb-3">List of hotels</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Rooms</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hotels as $hotel)
                                    <tr class="align-middle">
                                        <th scope="row">{{ $hotel->id }}</th>
                                        <td>
                                            <img src="{{ asset('storage/'. $hotel->photo) }}" alt="" width="80px" height="50px" class="rounded-2 object-fit-cover">
                                        </td>
                                        <td>{{ $hotel->name }}</td>
                                        <td>{{ $hotel->city }}</td>
                                        <td>{{ $hotel->room }}</td>
                                        <td>
                                            <a href="{{ route('admin.hotels.edit', $hotel->id) }}"
                                                class="btn btn-warning btn-sm text-white">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <button type="button" class="btn btn-danger btn-sm text-white"
                                                data-bs-toggle="modal" data-bs-target="#deleteHotelModal{{ $hotel->id }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                            <div class="modal fade" id="deleteHotelModal{{ $hotel->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete the hotel
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <lord-icon src="https://cdn.lordicon.com/hwjcdycb.json"
                                                                trigger="hover" colors="primary:#d1495b,secondary:#edae49"
                                                                style="width:100%;height:120px">
                                                            </lord-icon>
                                                            <p class="fs-5">Are you sure you want to delete this hotel?
                                                            </p>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <form action="{{ route('admin.hotels.destroy', $hotel->id) }}"
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
                                        <td colspan="6">There is no hotels available.</td>
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
