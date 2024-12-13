@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-xl-6">
            @if (session('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check"></i>
                    <strong class="mx-2">Success</strong> - {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card bg-white">
                <div class="card-body">
                    <h3 class="card-title mb-3">Edit user</h3>
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="first_name" class="form-label">First name</label>
                                <input type="text" name="first_name" class="form-control" id="first_name"
                                    placeholder="John" value="{{ $user->first_name }}">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="last_name" class="form-label">Last name</label>
                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Doe"
                                    value="{{ $user->last_name }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="admin@example.com" value="{{ $user->email }}">
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="********">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirm password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation" placeholder="********">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" value="1" type="radio" name="is_admin"
                                    id="status_radio1" {{ $user->is_admin ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_radio1">Admin</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="0" type="radio" name="is_admin"
                                    id="status_radio2" {{ !$user->is_admin ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_radio2">User</label>
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
