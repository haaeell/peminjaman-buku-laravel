@extends('layouts.dashboard')

@section('content')
@section('judul','Edit Buku')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
           
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">
                            Judul <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="title" name="title" value="{{$book->title}}" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="author" class="col-sm-3 col-form-label">
                            Penulis <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="author" name="author" value="{{$book->author}}" class="form-control @error('author') is-invalid @enderror">
                            @error('author')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category_id" class="col-sm-3 col-form-label">
                            Kategori <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror select2">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            
                            @error('category_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="gambar" class="col-sm-3 col-form-label">
                            Gambar<span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9 flex-row">
                            <img src="{{ asset('public/posts/' . $book->image) }}"  class="img-preview img-fluid mb-4 col-sm-8" alt="">
                            <input type="file" id="gambar" value="{{$book->image}}"  onchange="previewImage()" name="image" class="form-control-file @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="publisher" class="col-sm-3 col-form-label">
                            Penerbit <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" value="{{$book->publisher}}"  id="publisher" name="publisher" class="form-control @error('publisher') is-invalid @enderror">
                            @error('publisher')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label">
                            Tahun Terbit <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" id="year" value="{{$book->year}}"  name="year" class="form-control @error('year') is-invalid @enderror">
                            @error('year')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-3 col-form-label">
                            Stok Buku <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" id="stok" value="{{$book->stok}}" name="stok" class="form-control @error('stok') is-invalid @enderror">
                            @error('stok')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">
                            Deskripsi<span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <textarea  id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ $book->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("gambar").files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("preview").src = oFREvent.target.result;
        };
    }
</script>

@endsection
