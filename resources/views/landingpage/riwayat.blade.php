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

<div class="container vh-100">
    <h4 class="text-center mt-2 fw-bold">RIWAYAT PEMINJAMAN</h4>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card p-3">
                <div class="card-body  p-0">
                    <div class="table-responsive ">
                        <table class="table table-hovered" id="table_id">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Gambar</th>
                                    <th>Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Wajib Kembali</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Denda</th>
                                    <th>Status buku</th>
                                    <th>Status admin</th>
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
                                        <td>
                                            {{ $peminjaman->tanggal_pengembalian ? Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)->formatLocalized('%d %B %Y')  : 'Belum Dikembalikan' }}
                                        </td>
                                        
                                        <td>Rp. {{ number_format($peminjaman->denda, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($peminjaman->status == 'menunggu persetujuan admin')
                                                <span class="fw-bold text-danger">{{ $peminjaman->status }}</span>
                                            @elseif ($peminjaman->status == 'sedang dipinjam')
                                                <span class="fw-bold text-success">{{ $peminjaman->status }}</span>
                                            @else
                                                <span class="fw-bold">{{ $peminjaman->status }}</span>
                                            @endif
                                        </td>
                                        
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
