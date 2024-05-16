@extends('app')
@section('title', 'User List')
@section('content')
<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
   <div class="d-flex justify-content-between">
    <h1>Users</h1>
    <a href="{{ route('user.create') }}">Creat New</a>
   </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
    $i = 1;
    @endphp
    @foreach($users as $user)
    <tr>
      <th scope="row">{{ $i++ }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email}}</td>
      <td>{{ $user->phone_no }}</td>
      <td>
        {{-- <a href="{{ url('edit/'.$user->id) }}">Edit</a> --}}
        <a href="{{ route('user.edit', $user->id) }}">Edit</a>
        <form action="{{ route('user.delete', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>

        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
   </div>
@endsection