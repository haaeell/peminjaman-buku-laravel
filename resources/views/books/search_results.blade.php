@if ($books->count() > 0)
<div class="row d-flex justify-content-center">
    @foreach ($books as $item)
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
                    <span class="badge" style="background-color: {{$item->category->color}}; margin-top:-20px;">{{$item->category->name}}</span>
                    <p class="card-title fw-semibold" style="height: 50px;">
                        {{ $item->title }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@else
    <p class="text-center">-- Buku Tidak Ada --</p>
@endif
