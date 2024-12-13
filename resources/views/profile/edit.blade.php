@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-xl-6">
            @if (session('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check"></i>
                    <strong>Success</strong> - {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-3">Edit profile</h3>
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="first_name" class="form-label">First name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="first_name"
                                    class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                    placeholder="John" value={{ $user->first_name }}>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="last_name" class="form-label">Last name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="last_name"
                                    class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                    placeholder="Doe" value={{ $user->last_name }}>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="admin@example.com" value={{ $user->email }}>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="********">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirm password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" placeholder="********">

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone number</label>
                            <input type="text" name="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                                placeholder="0612345678" value={{ $user->phone_number }}>

                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                                id="address" placeholder="62, bd de la Gironde," value={{ $user->address }}>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" name="city"
                                    class="form-control @error('city') is-invalid @enderror" id="city"
                                    placeholder="Casablanca" value={{ $user->city }}>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="zip_code" class="form-label">ZIP code</label>
                                <input type="text" name="zip_code"
                                    class="form-control @error('zip_code') is-invalid @enderror" id="zip_code"
                                    placeholder="20000" value={{ $user->zip_code }}>

                                @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
