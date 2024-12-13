@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-start gap-3">
        @foreach ($hotels as $hotel)
            <div class="col-md-5 col-xl-3 p-0">
                <a href="{{ route('hotels.show', $hotel->id) }}" class="text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $hotel->photo) }}" alt="" width="100%"
                                class="rounded mb-md-2">
                            <h1 class="text-center fs-4 text-truncate">{{ $hotel->name }}</h1>
                            <div class="d-flex justify-content-between">
                                <p class="m-0"><i class="fa-solid fa-location-dot"></i> {{ $hotel->city }}</p>
                                <p class="m-0"><i class="fa-solid fa-bed"></i> {{ $hotel->room }} rooms</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
