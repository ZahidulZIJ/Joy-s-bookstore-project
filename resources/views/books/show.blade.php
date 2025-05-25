@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Book Details</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">by {{ $book->author }}</h6>

            <p class="card-text"><strong>ISBN:</strong> {{ $book->isbn }}</p>
            <p class="card-text"><strong>Stock:</strong> {{ $book->stock }}</p>
            <p class="card-text"><strong>Price:</strong> ${{ number_format($book->price, 2) }}</p>
        </div>
    </div>

    <a href="{{ route('books.index') }}" class="btn btn-dark mt-3">Back to List</a>
</div>
@endsection
