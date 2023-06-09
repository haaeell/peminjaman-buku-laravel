
@extends ('layouts.dashboard')

@section('content')
@section('judul','Dashboard Admin')
@section('title','Dashboard Admin')

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Buku</h4>
          </div>
          <div class="card-body">
            {{$books->count()}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-newspaper"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Kategori</h4>
          </div>
          <div class="card-body">
            {{$categories->count()}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Peminjaman</h4>
          </div>
          <div class="card-body">
            1,201
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-circle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Pengembalian</h4>
          </div>
          <div class="card-body">
            47
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4>2 Data Buku Terbaru</h4>
          <div class="card-header-action">
            <a href="{{route('books.index')}}" class="btn btn-danger">Data buku <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive table-invoice">
            <table class="table table-striped">
              
              <tr>
                <th>No</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Tahun</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th>Penerbit</th>
                                <th>Deskripsi</th>
              </tr>
              @foreach ($books as $book)
              <tr>
                <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->year }}</td>
                                    <td>
                                      <div class="badge" style="background-color: {{ $book->category->color }}; color:white;"> {{ $book->category->name }}
                                      </div>
                                    </td>
                                    <td> <img src="{{ asset('/public/posts/' . $book->image) }}" style="width: 80px;"
                                      alt=""></td>
                                      <td>{{ $book->publisher }}</td>
                                      <td>{{ Str::limit($book->description, 10) }}</td>
              </tr>
              @endforeach
              
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
        <div class="card gradient-bottom">
          <div class="card-header">
            <h4>Top 5 Products</h4>
            <div class="card-header-action dropdown">
              <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
              <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <li class="dropdown-title">Select Period</li>
                <li><a href="#" class="dropdown-item">Today</a></li>
                <li><a href="#" class="dropdown-item">Week</a></li>
                <li><a href="#" class="dropdown-item active">Month</a></li>
                <li><a href="#" class="dropdown-item">This Year</a></li>
              </ul>
            </div>
          </div>
          <div class="card-body" id="top-5-scroll">
            <ul class="list-unstyled list-unstyled-border">
              <li class="media">
                <img class="mr-3 rounded" width="55" src="{{asset('stisla/assets')}}/img/products/product-3-50.png" alt="product">
                <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small">86 Sales</div></div>
                  <div class="media-title">oPhone S9 Limited</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div class="budget-price-square bg-primary" data-width="10%"></div>
                      <div class="budget-price-label">$68,714</div>
                    </div>
                    <div class="budget-price">
                      <div class="budget-price-square bg-danger" data-width="80%"></div>
                      <div class="budget-price-label">$38,700</div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <img class="mr-3 rounded" width="55" src="{{asset('stisla/assets')}}/img/products/product-4-50.png" alt="product">
                <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small">67 Sales</div></div>
                  <div class="media-title">iBook Pro 2018</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div class="budget-price-square bg-primary" data-width="84%"></div>
                      <div class="budget-price-label">$107,133</div>
                    </div>
                    <div class="budget-price">
                      <div class="budget-price-square bg-danger" data-width="60%"></div>
                      <div class="budget-price-label">$91,455</div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <img class="mr-3 rounded" width="55" src="{{asset('stisla/assets')}}/img/products/product-1-50.png" alt="product">
                <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small">63 Sales</div></div>
                  <div class="media-title">Headphone Blitz</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div class="budget-price-square bg-primary" data-width="34%"></div>
                      <div class="budget-price-label">$3,717</div>
                    </div>
                    <div class="budget-price">
                      <div class="budget-price-square bg-danger" data-width="28%"></div>
                      <div class="budget-price-label">$2,835</div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <img class="mr-3 rounded" width="55" src="{{asset('stisla/assets')}}/img/products/product-3-50.png" alt="product">
                <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small">28 Sales</div></div>
                  <div class="media-title">oPhone X Lite</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div class="budget-price-square bg-primary" data-width="45%"></div>
                      <div class="budget-price-label">$13,972</div>
                    </div>
                    <div class="budget-price">
                      <div class="budget-price-square bg-danger" data-width="30%"></div>
                      <div class="budget-price-label">$9,660</div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <img class="mr-3 rounded" width="55" src="{{asset('stisla/assets')}}/img/products/product-5-50.png" alt="product">
                <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small">19 Sales</div></div>
                  <div class="media-title">Old Camera</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div class="budget-price-square bg-primary" data-width="35%"></div>
                      <div class="budget-price-label">$7,391</div>
                    </div>
                    <div class="budget-price">
                      <div class="budget-price-square bg-danger" data-width="28%"></div>
                      <div class="budget-price-label">$5,472</div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="card-footer pt-3 d-flex justify-content-center">
            <div class="budget-price justify-content-center">
              <div class="budget-price-square bg-primary" data-width="20"></div>
              <div class="budget-price-label">Selling  </div>
            </div>
            <div class="budget-price justify-content-center">
              <div class="budget-price-square bg-danger" data-width="20"></div>
              <div class="budget-price-label">Budget</div>
            </div>
          </div>
        </div>
      </div>

      
@endsection
