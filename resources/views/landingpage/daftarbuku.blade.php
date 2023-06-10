@extends('layouts.landingpage')

@section('content')

<div style="height: 100px"></div>

<section class="mt-5">
    <div class="container mt-3">
        <div class="card border-0 p-5">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($books as $item)
                    <div class="swiper-slide border">
                        <div class="card">
                            <img src="{{asset('public/posts/'. $item->image) }}" style="height: 200px;object-fit:cover;" class="card-img-top" alt="Book Image">
                            <div class="card-body">
                                <h5 class="card-title" style="height: 50px">{{ $item->title }}</h5>
                                <a href="{{ route('landingpage.show', $item->id) }}" class="btn btn-primary">Detail</a>

                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>
@endsection
