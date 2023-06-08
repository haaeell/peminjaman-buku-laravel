@extends('layouts.landingpage')
@section('content')
<div class="container">
    <div style="height: 100px;"></div>
    <div class="row d-flex justify-content-center">
        <h1 class="text-center mb-4">Detail Buku</h1>
        <div class="card shadow-md border-1 col-8">
            <div class="card-body">
                <h3 class="card-title fw-bold">{{ $book->title }}</h3>
                <div class="badge" style="background-color: {{ $book->category->color }}; color:white;"> {{ $book->category->name }}
                </div>
                <p class="card-text">{{ $book->description }}</p>
                <ul class="list-unstyled">
                    <li>Pengarang: {{ $book->author }}</li>
                    <li>Tahun: {{ $book->year }}</li>
                    <li>Penerbit: {{ $book->publisher }}</li>
                </ul>
                <a href="{{ route('books.index') }}" class="btn btn-primary">Back</a>
                <a href="{{ route('landingpage.store') }}" class="btn btn-success">Pinjam </a>
            </div>
        </div>
    </div>
    
</div>
@endsection
