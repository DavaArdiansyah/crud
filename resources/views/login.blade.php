<!-- resources/views/login.blade.php -->

@extends('layout')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" href="buku.php">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
