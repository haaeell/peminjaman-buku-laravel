@extends ('layouts.dashboard')

@section('content')
@section('judul', 'Tabel Peminjaman')
@section('title', 'Tabel Peminjaman')

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

                <a href="{{ route('peminjaman.create') }}" class="btn btn-primary mb-3">Tambah</a>
                <div class="table-responsive">
                    <table class="table table-striped" id="table_id">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Peminjam</th>
                                <th>Buku</th>
                                <th>Gambar</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Wajib Kembali</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Denda</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamans as $peminjaman)
                                <tr>
                                    <td>{{ $peminjaman->id }}</td>
                                    <td>{{ $peminjaman->user->name }}</td>
                                    <td> <img src="{{ asset('/public/posts/' . $peminjaman->book->image) }}"
                                            style="width: 80px;" alt=""></td>
                                    <td>{{ $peminjaman->book->title }}</td>
                                    <td>{{ $peminjaman->tanggal_pinjam }}</td>
                                    <td>{{ $peminjaman->tanggal_wajib_kembali }}</td>
                                    <td>{{ $peminjaman->tanggal_pengembalian }}</td>
                                    <td>Rp.{{ number_format($peminjaman->denda, 0, ',', '.') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            @if (!$peminjaman->approved)
                                            <form action="{{ route('peminjaman.approve', $peminjaman->id) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-primary">Setujui</button>
                                            </form>
                                            
                                            @else
                                                <span class="text-success">Disetujui</span>
                                            @endif
                                            <a href="{{ route('peminjaman.edit', $peminjaman->id) }}"
                                                class="btn btn-warning mr-1">pengembalian</a>
                                            <form method="POST"
                                                action="{{ route('categories.destroy', $peminjaman->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger delete-button"
                                                    data-name="{{ $peminjaman->user->name }}"
                                                    data-id="{{ $peminjaman->id }}">Hapus</button>
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
