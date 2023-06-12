@extends('layouts.landingpage')

@section('content')
    <div style="height: 100px"></div>


    <div class="container">
        <nav style="--bs-breadcrumb-divider: '   >   ';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="nav-link">Home</a></li>
                <li class="breadcrumb-item fw-semibold" aria-current="page"> <a href="{{ route('landingpage.create') }}"
                        style="text-decoration:none; color:rgb(44, 44, 44);"> Daftar Buku</a></li>
            </ol>
        </nav>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="search" placeholder="Cari judul buku..." name="search" class="form-control"
                            id="searchInput">
                        <div class="input-group-append">
                            <button class="btn btn-register btn-sm" type="button" id="searchButton">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div id="searchResults"></div>
        </div>

        <div class="container mt-5">
            <h4 class="fw-bold mb-4">ALL BOOKS</h4>
            <div class="owl-carousel">
                @foreach ($books as $item)
                    <div class="item card border-0 mb-5">
                        <div class="position-relative">
                            <img src="{{ asset('public/posts/' . $item->image) }}"
                                style="height: 200px;width:150px; object-fit: cover;box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;"
                                class="card-img-top" alt="Book Image">
                            <div class="overlay">
                                <a href="{{ route('landingpage.show', $item->id) }}" class="btn btn-buku btn-sm">Detail</a>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <span class="badge"
                                style="background-color: {{ $item->category->color }}; margin-top:-20px;">{{ $item->category->name }}</span>
                            <p class="card-title fw-semibold" style="height: 50px;">
                                {{ $item->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                @foreach ($categories as $category)
                    <h4 id="{{ $category->name }}" class="fw-bold mb-4 text-center">{{ $category->name }}</h4>


                    @php
                        $categoryBooks = $books->where('category_id', $category->id)->take(10);
                    @endphp

                    @if ($categoryBooks->count() > 0)
                        <div class="row">
                            @foreach ($categoryBooks as $item)
                                <div class="col-md-2">
                                    <div class="card border-0">
                                        <div class="position-relative">
                                            <img src="{{ asset('public/posts/' . $item->image) }}"
                                                style="height: 200px;width:160px; object-fit: cover;box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;"
                                                class="card-img-top" alt="Book Image">
                                            <div class="overlay">
                                                <a href="{{ route('landingpage.show', $item->id) }}"
                                                    class="btn btn-buku btn-sm">Detail</a>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <span class="badge"
                                                style="background-color: {{ $item->category->color }}; margin-top:-20px;">{{ $item->category->name }}</span>
                                            <p class="card-title fw-semibold" style="height: 50px;">
                                                {{ $item->title }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">-- Belum ada buku -- </p>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
    </div>
@endsection
