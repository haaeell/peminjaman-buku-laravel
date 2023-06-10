@extends ('layouts.dashboard')

@section('content')
@section('judul', 'Tabel Buku')
@section('title', 'Tabel Buku')

@if (session('success'))
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            {{ session('success') }}
        </div>
    </div>
@endif


<div class="row mt-3">
    <div class="col-md-12">
        <div class="card p-3">
            <div class="card-body p-0">

                <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Tambah</a>
                <div class="table-responsive">
                    <table class="table table-striped" id="table_id">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Tahun</th>
                                <th>Penerbit</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Gambar</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->year }}</td>
                                    <td>{{ $book->publisher }}</td>
                                    <td>
                                        <div class="badge" style="background-color: {{ $book->category->color }}; color:white;"> {{ $book->category->name }}
                                        </div>
                                    </td>
                                    <td>{{ $book->stok }}</td>
                                    <td> <img src="{{ asset('/public/posts/' . $book->image) }}" style="width: 80px;"
                                            alt=""></td>
                                    <td>{{ Str::limit($book->description, 10) }}</td>

                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('books.show', $book->id) }}"
                                                class="btn btn-info mr-1">View</a>
                                            <a href="{{ route('books.edit', $book->id) }}"
                                                class="btn btn-warning mr-1">Edit</a>
                                            <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger delete-button"
                                                    data-name="{{ $book->title }}"
                                                    data-id="{{ $book->id }}">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
