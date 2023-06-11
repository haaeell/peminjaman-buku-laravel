@extends ('layouts.dashboard')

@section('content')
@section('judul', 'Tabel pengembalian')
@section('title', 'Tabel pengembalian')

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

                <a href="{{ route('pengembalian.create') }}" class="btn btn-primary mb-3">Tambah</a>
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
                                <th>Denda</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengembalians as $pengembalian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pengembalian->user->name }}</td>
                                    <td> <img src="{{ asset('/public/posts/' . $pengembalian->book->image) }}"
                                            style="width: 80px;" alt=""></td>
                                    <td>{{ $pengembalian->book->title }}</td>
                                    <td>{{ Carbon\Carbon::parse($pengembalian->tanggal_pinjam)->formatLocalized('%d %B %Y') }}
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($pengembalian->tanggal_wajib_kembali)->formatLocalized('%d %B %Y') }}
                                    </td>
                                    <td>
                                        @if ($pengembalian->tanggal_pengembalian)
                                            {{ Carbon\Carbon::parse($pengembalian->tanggal_pengembalian)->formatLocalized('%d %B %Y') }}
                                        @else
                                            Belum Dikembalikan
                                        @endif
                                    </td>
                                    <td>{{ $pengembalian->status }}</td>
                                    

                                    <td>Rp.{{ number_format($pengembalian->denda, 0, ',', '.') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            @if ($pengembalian->tanggal_pengembalian == null)
                                            <a href="{{ route('pengembalian.edit', $pengembalian->id) }}"
                                                class="btn btn-warning mr-1">pengembalian</a> 
                                            @endif
                                            
                                            <form method="POST"
                                                action="{{ route('pengembalian.destroy', $pengembalian->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger delete-button"
                                                    data-name="{{ $pengembalian->user->name }}"
                                                    data-id="{{ $pengembalian->id }}">Hapus</button>
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
