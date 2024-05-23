@extends('app')
@section('title', 'User Create')
@section('content')
    <div class="container mt-5">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endforeach
        @endif
        
        <form method="POST" action="{{ route('user.store') }}">
            @csrf
            <div class="form-group" >
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="form-group">
                <label for="phone_no">Phone No</label>
                <input type="number" name="phone_no" class="form-control" id="phone_no" value="{{ old('phone_no') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
