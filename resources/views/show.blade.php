@extends('layouts.landingpage')
@section('content')
<div class="container">
    <div style="height: 100px;"></div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <p class="card-text">{{ $book->description }}</p>
            <ul class="list-unstyled">
                <li>Author: {{ $book->author }}</li>
                <li>Year: {{ $book->year }}</li>
                <li>Category: {{ $book->category->name }}</li>
                <li>Publisher: {{ $book->publisher }}</li>
            </ul>
            <a href="{{ route('books.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
