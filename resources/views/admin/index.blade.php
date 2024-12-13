@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-5 col-xl-4 col-xxl-3 mb-3">
            <div class="card bg-white">
                <div class="card-body text-center">
                    <div class="w-100">
                        <lord-icon src="https://cdn.lordicon.com/gznfrpfp.json" trigger="hover"
                            colors="primary:#30638e,secondary:#003d5b" style="width:100%;height:150px">
                        </lord-icon>
                    </div>
                    <h5 class="card-title">Users</h5>
                    <a href="{{ route('users.index') }}" class="btn btn-primary w-50">{{ $users }}</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-5 col-xl-4 col-xxl-3 mb-3">
            <div class="card bg-white">
                <div class="card-body text-center">
                    <lord-icon src="https://cdn.lordicon.com/jeuxydnh.json" trigger="hover"
                        colors="primary:#30638e,secondary:#003d5b" style="width:100%;height:150px">
                    </lord-icon>
                    <h5 class="card-title">Rooms</h5>
                    <a href="{{ route('rooms.index') }}" class="btn btn-primary w-50">{{ $rooms }}</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-5 col-xl-4 col-xxl-3 mb-3">
            <div class="card bg-white">
                <div class="card-body text-center">
                    <div class="w-100">
                        <lord-icon src="https://cdn.lordicon.com/uphbloed.json" trigger="hover"
                            colors="primary:#30638e,secondary:#003d5b" style="width:100%;height:150px">
                        </lord-icon>
                    </div>
                    <h5 class="card-title">Bookings</h5>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary w-50">{{ $bookings }}</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-5 col-xl-4 col-xxl-3 mb-3">
            <div class="card bg-white">
                <div class="card-body text-center">
                    <div class="w-100">
                        <lord-icon src="https://cdn.lordicon.com/tjjwskjx.json" trigger="hover"
                            colors="primary:#30638e,secondary:#003d5b" style="width:100%;height:150px">
                        </lord-icon>
                    </div>
                    <h5 class="card-title">Hotels</h5>
                    <a href="{{ route('admin.hotels.index') }}" class="btn btn-primary w-50">{{ $hotels }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
