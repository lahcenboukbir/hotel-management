@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-xl-6">
            <div class="card bg-white">
                <div class="card-body">
                    <h3 class="card-title mb-3">Edit hotel</h3>
                    <form action="{{ route('admin.hotels.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class=" mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="ABC Hotel"
                                value="{{ $hotel->name }}">
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control" id="city"
                                    placeholder="Casablanca" value="{{ $hotel->city }}">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="room" class="form-label">Room <span class="text-danger">*</span></label>
                                <input type="number" name="room" class="form-control" id="room" placeholder="8"
                                    value="{{ $hotel->room }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input class="form-control" type="file" name="photo" id="photo"
                                value="{{ $hotel->photo }}">
                        </div>

                        <div>
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
