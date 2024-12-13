@extends('layouts.app')

@section('content')
    <div class="row align-items-center">
        <div class="col-md-7 col-12 p-4 d-flex justify-content-center">
            <img src="{{ asset('images/svg/booked.svg') }}" alt="" class="w-75">
        </div>
        <div class="col-md-5 col-12 p-4">
            <div class="card bg-white">
                <div class="card-body">
                    <form action="{{route('search.rooms')}}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start date</label>
                            <input type="date" class="form-control" id="entry_date">
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">End date</label>
                            <input type="date" class="form-control" id="exit_date">
                        </div>

                        <div>
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
