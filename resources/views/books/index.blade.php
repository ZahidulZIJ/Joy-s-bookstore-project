@extends('layouts.app') <!-- Optional: if you have a layout file -->

@section('content')
<div class="container mt-2">
    <h2 class="mb-4">Book List</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
    <form action="{{ route('books.index') }}" method="GET" class="d-flex" style="flex: 1;">
        <input type="text" name="search" class="form-control me-2" placeholder="Search books..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Search</button>
    </form>
    <a href="{{ route('books.create') }}" class="btn btn-success ms-3">New Book</a>
</div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Stock</th>
                <th>Price ($)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->stock }}</td>
                <td>{{ $book->price }}</td>
                <td>
    <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-outline-success">view</a>
<a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
<form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
</form>
    </form>
</td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No books found.</td>
            </tr>
        @endforelse
        </tbody>
            </table>
            <div class="mt-4">
    {!! $books->links('pagination::bootstrap-5') !!}
</div>

</div>
@endsection
