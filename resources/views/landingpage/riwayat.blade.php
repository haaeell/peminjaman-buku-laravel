@extends ('layouts.landingpage')

@section('content')
<div style="height: 100px"></div>

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

<div class="container">
    <h4 class="text-center mt-2 fw-bold">RIWAYAT PEMINJAMAN</h4>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card border-0 shadow-md p-3">
                <div class="card-body  p-0">
                    <div class="table-responsive ">
                        <table class="table table-hovered" id="table_id">
                            <thead>
                                <tr>
                                    <th>No</th>
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
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $peminjaman->user->name }}</td>
                                        <td> <img src="{{ asset('/public/posts/' . $peminjaman->book->image) }}"
                                                style="width: 80px;" alt=""></td>
                                        <td>{{ $peminjaman->book->title }}</td>
                                        <td>{{ $peminjaman->tanggal_pinjam }}</td>
                                        <td>{{ $peminjaman->tanggal_wajib_kembali }}</td>
                                        <td>{{ $peminjaman->tanggal_pengembalian }}</td>
                                        <td>Rp. {{ number_format($peminjaman->denda, 0, ',', '.') }}</td>
                                        <td>
                                            
                                            @if ($peminjaman->approved == 1)
                                                <span class="badge rounded-pill text-bg-success">Disetujui</span>
                                            @else
                                                <span class="badge rounded-pill text-bg-warning">Pending</span>
                                            @endif
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
</div>

@endsection
