@extends('app')
@section('title', 'Post List')
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
    <h1>posts</h1>
    <a href="{{ route('posts.create') }}">Creat New</a>
   </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">post</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
    $i = 1;
    @endphp
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{ $i++ }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->description}}</td>
      <td>{{ $post->user->name }}</td>
      <td>
        {{-- <a href="{{ url('edit/'.$post->id) }}">Edit</a> --}}
        {{-- <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
        <form action="{{ route('posts.delete', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>

        </form> --}}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
   </div>
@endsection