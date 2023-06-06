@extends('layouts.dashboard')

@section('content')
@section('judul', 'View Buku')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="{{ asset('/public/posts/' . $book->image) }}" w="100"
                            class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Tahun</div>
                                <div class="profile-widget-item-value">{{ $book->year }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Penerbit</div>
                                <div class="profile-widget-item-value">{{ $book->publisher }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Pengarang</div>
                                <div class="profile-widget-item-value">{{ $book->author }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">{{ $book->title }} <div class="d-inline font-weight-normal">
                            </div>
                            <div class="badge" style="background-color: {{ $book->category->color }}; color:white;">
                                {{ $book->category->name }}
                            </div>
                        </div>
                    </div>
                    <p>
                        
                    {{ $book->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
