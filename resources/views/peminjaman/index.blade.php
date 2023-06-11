@extends ('layouts.dashboard')

@section('content')
@section('judul', 'Tabel Peminjaman')
@section('title', 'Tabel Peminjaman')


<div class="row d-flex justify-content-center">
    <div class="col-md-3">
        <div class="alert alert-danger">
           data yang belum disetujui: <strong>{{ $belumDisetujuiCount }}</strong>
        </div>
    </div>
    <div class="col-md-3">
        <div class="alert alert-info">
            
    Jumlah data buku : <strong>{{ $peminjamans->count() }}</strong>
        </div>
    </div>
</div>

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
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamans as $peminjaman)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peminjaman->user->name }}</td>
                                    <td> <img src="{{ asset('/public/posts/' . $peminjaman->book->image) }}"
                                            style="width: 80px;" alt=""></td>
                                    <td>{{ $peminjaman->book->title }}</td>
                                    <td>{{ Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->formatLocalized('%d %B %Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($peminjaman->tanggal_wajib_kembali)->formatLocalized('%d %B %Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)->formatLocalized('%d %B %Y') }}</td>
                                    <td>{{ $peminjaman->status}}</td>
                                    <td>
                                        <div class="d-flex">
                                            @if (!$peminjaman->approved)
                                            <form action="{{ route('peminjaman.approve', $peminjaman->id) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-primary">Setujui</button>
                                            </form>
                                            @else
                                                <span class="badge badge-success mr-3 text-center">Disetujui</span>
                                            @endif
                                            @if ($peminjaman->approved == '0')
                                            <form method="POST"
                                            action="{{ route('peminjaman.destroy', $peminjaman->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger delete-button"
                                                data-name="{{ $peminjaman->user->name }}"
                                                data-id="{{ $peminjaman->id }}">Hapus</button>
                                        </form>
                                            @endif
                                            
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
