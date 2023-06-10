@extends('layouts.landingpage')

@section('content')
    
    <div class="container">
        <div style="height: 100px;"></div>

        <div class="row d-flex justify-content-center">
            @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hai {{ Auth::user()->name }}</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Hai {{ Auth::user()->name }}</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
            <h1 class="text-center mb-4">Detail Buku</h1>
            <div class="card shadow-md border-1 col-8">
                <div class="card-body">
                    <h3 class="card-title fw-bold">{{ $book->title }}</h3>
                    <div class="badge" style="background-color: {{ $book->category->color }}; color:white;">
                        {{ $book->category->name }}
                    </div>
                    <p class="card-text">{{ $book->description }}</p>
                    <ul class="list-unstyled">
                        <li>Pengarang: {{ $book->author }}</li>
                        <li>Tahun: {{ $book->year }}</li>
                        <li>Penerbit: {{ $book->publisher }}</li>
                    </ul>
                    <a href="{{ route('books.index') }}" class="btn btn-primary">Back</a>
                    @if (Auth::user() != null)
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalPinjam">
                        Pinjam Buku
                    </button>
                    @else
                    <button type="button" class="btn btn-success" onclick="alert('anda belum login silahkan login terlebih dahulu')">
                        Pinjam Buku
                    </button>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalPinjam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Peminjaman Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Tampilkan pesan error validasi -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
    @auth
                    <form action="{{ route('landingpage.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Nama Buku</label>
                            <input type="text" class="form-control" value="{{ $book->title }}" disabled>
                            <input type="hidden" name="book_id" class="form-control" id="title"
                                value="{{ $book->id }}">
                        </div>
                        <div class="mb-3">
                            <label for="user" class="form-label">Nama Peminjam</label>
                            <input type="hidden" name="user_id" class="form-control" id="tanggal_peminjaman"
                                value="{{ Auth::user()->id }}">
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" name="tanggal_pinjam" class="form-control" id="tanggal_peminjaman">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                            <input type="date" name="tanggal_pengembalian" class="form-control"
                                id="tanggal_pengembalian">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
                @endauth
            </div>
        </div>
    </div>
    
@endsection
