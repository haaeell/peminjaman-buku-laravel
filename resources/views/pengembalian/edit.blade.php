@extends('layouts.dashboard')

@section('content')
    <h1>Edit pengembalian</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengembalian.update', $pengembalian->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Nama Peminjam</label>
            <input readonly type="text" name="title" value="{{$pengembalian->user->name}}" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="title">Nama Buku</label>
            <input readonly type="text" name="title" value="{{$pengembalian->book->title}}" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
