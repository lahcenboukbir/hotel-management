@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-xl-6">
            <div class="card bg-white">
                <div class="card-body">
                    <h3 class="card-title mb-3">Add a user</h3>
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="first_name" class="form-label">First name</label>
                                <input type="text" name="first_name" class="form-control" id="first_name"
                                    placeholder="John">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="last_name" class="form-label">Last name</label>
                                <input type="text" name="last_name" class="form-control" id="last_name"
                                    placeholder="Doe">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="admin@example.com">
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
                                    id="status_radio1">
                                <label class="form-check-label" for="status_radio1">Admin</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="0" type="radio" name="is_admin"
                                    id="status_radio2" checked>
                                <label class="form-check-label" for="status_radio2">User</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
