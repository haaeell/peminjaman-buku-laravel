@extends('layouts.landingpage')

@section('content')
    <div style="height: 100px"></div>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '   >   ';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="nav-link">Home</a></li>
                <li class="breadcrumb-item" aria-current="page"> <a href="{{route('landingpage.create')}}" style="text-decoration:none; color:rgb(44, 44, 44);" > Daftar Buku</a></li>
                <li class="breadcrumb-item fw-semibold" aria-current="page">{{ $book->title }}</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-center align-items-center gap-4">
            @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hai {{ Auth::user()->name }}</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Hai {{ Auth::user()->name }}</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
            <div class="col-md-3 d-flex align-items-center justify-content-center py-5 flex-column">
                <img src="{{ asset('public/posts/' . $book->image) }}" style="width:200px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;"
                    class="rounded" alt="">
                @if (Auth::check())
                        @if ($book->stok > 0)
                            <button type="button" class="btn btn-register mt-3" data-bs-toggle="modal" data-bs-target="#modalPinjam">
                                Pinjam Buku
                            </button>
                        @else
                            <button type="button" class="btn btn-register mt-3" onclick="Swal.fire({
                                icon: 'info',
                                title: 'Stok buku habis',
                                showConfirmButton: false,
                                timer: 2000
                            })">Pinjam Buku</button>
                        @endif
                    @else
                        <button type="button" class="btn btn-register mt-3" onclick="Swal.fire({
                            icon: 'warning',
                            title: 'Anda belum login',
                            text: 'Silahkan login terlebih dahulu',
                            showCancelButton: true,
                            confirmButtonText: 'OK',
                            cancelButtonText: 'Batal',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '{{ route('login') }}';
                            }
                        })">Pinjam Buku</button>
                    @endif
            </div>
            
            <div class="col-md-8  py-5 px-5">
                <h3 class="fw-semibold">{{$book->title}}</h3>
                <span class="badge mb-3" style="background-color: {{ $book->category->color }}; color:white;"> {{ $book->category->name }}
                </span>
                <div class="row">
                    <div class="col-md-7">
                        <table class="table table-borderless">
                            <tbody>
                              <tr>
                                <td>Pengarang</td>
                                <td class="text-end">:</td>
                                <td><span class="fw-semibold">{{$book->author}}</span></td>
                              </tr>
                              <tr>
                                <td>Tahun</td>
                                <td class="text-end">:</td>
                                <td><span class="fw-semibold">{{$book->year}}</span></td>
                              </tr>
                              <tr>
                                <td>Penerbit</td>
                                <td class="text-end">:</td>
                                <td><span class="fw-semibold">{{$book->publisher}}</span></td>
                              </tr>
                              <tr>
                                <td>Stok Buku</td>
                                <td class="text-end">:</td>
                                <td><span class="fw-semibold">{{$book->stok}}</span></td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
                
                  
                <hr class="my-2">
                <p class="text-muted text-center">{{$book->description}}</p>
            </div>
        </div>


    {{-- KOMENTAR --}}

    <div class="p-5 d-flex flex-column justify-content-start " style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
        <h4 class="fw-semibold">Komentar</h4>
        <div class="d-flex justify-content-start align-items-center mb-3">
            <div class="me-3">
                <p class="m-0">Sort By</p>
            </div>
            <div class="dropdown">
                <a class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    News
                </a>
                <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                    <li><a class="dropdown-item" href="#">Option 1</a></li>
                    <li><a class="dropdown-item" href="#">Option 2</a></li>
                    <li><a class="dropdown-item" href="#">Option 3</a></li>
                </ul>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex align-items-start">
                <img src="{{ asset('stisla/assets') }}/img/avatar/avatar-5.png" class="rounded-circle me-3" alt="Profile Picture" style="width: 50px; height: 50px;">
                <div>
                  <h5 class="fw-semibold">Nama Pengguna</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, tempore ut. Delectus fugiat, amet rem aperiam quam repellat explicabo impedit ipsum officia a voluptates illum quis tempora facere animi voluptas, maiores omnis libero. Omnis laudantium dicta quos tempore maiores ullam! Voluptatum ipsum consectetur magnam, sapiente rerum pariatur cumque hic eligendi.</p>
                  <div class="d-flex gap-3">
                    <a href="#" class="nav-link"><small class="text-secondary"><i class="bi bi-heart-fill text-danger"></i> Suka</small></a>
                    <a href="#" class="nav-link"><small class="text-secondary"><i class="bi-chat-left-text"></i> Balas</small></a>
                    <small class="text-secondary">1 Suka</small>
                    <small class="text-secondary">0 Balasan</small>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mt-2">
                    <a class="fw-semibold nav-link" data-bs-toggle="collapse" href="#repliesCollapse" role="button" aria-expanded="false" aria-controls="repliesCollapse">Show Replies</a>
                    <span class="text-muted">1 jam yang lalu</span>
                  </div>
                  <div class="collapse" id="repliesCollapse">
                    <div class="card mt-3">
                        <div class="card-body">
                          <div class="d-flex align-items-start">
                            <img src="{{ asset('stisla/assets') }}/img/avatar/avatar-5.png" class="rounded-circle me-3" alt="Profile Picture" style="width: 50px; height: 50px;">
                            <div>
                              <h5 class="fw-semibold">Nama Pembalas</h5>
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, tempore ut. Delectus fugiat, amet rem aperiam quam repellat explicabo impedit ipsum officia a voluptates illum quis tempora facere animi voluptas, maiores omnis libero. Omnis laudantium dicta quos tempore maiores ullam! Voluptatum ipsum consectetur magnam, sapiente rerum pariatur cumque hic eligendi.</p>
                              
                              <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="d-flex gap-3">
                                    <a href="#" class="nav-link"><small class="text-secondary"><i class="bi bi-heart-fill text-danger"></i> Suka</small></a>
                                    <small class="text-secondary">1 Suka</small>
                                  </div>
                                <span class="text-muted">1 jam yang lalu</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        
        <div class="mt-3">
            <div class="card">

                <textarea class="form-control" rows="4" placeholder="Tulis komentar"></textarea>
            </div>
            <button class="btn btn-register mt-2">Kirim</button>
          </div>
          
    </div>
    
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header border-0 d-flex justify-content-end">
              <button type="button" class="btn btn-modal rounded-circle" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="d-flex justify-content-center  mb-2">
              <h1 class="modal-title fw-semibold text-center fs-5 mb-3" id="exampleModalLabel">Login to your account!</h1>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row mb-3 d-flex justify-content-center align-items-center">
                    <div class="col-md-11">
                        <input id="email" placeholder="Email" type="email" class=" form-control px-4 py-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
      
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
      
                <div class="row mb-3 d-flex justify-content-center align-items-center">
                    <div class="col-md-11">
                        <input id="password" placeholder="Password" type="password" class="form-control px-4 py-3 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
      
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
      
                <div class="row mb-3 d-flex justify-content-center">
                  <div class="col-md-5">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                          <small class="form-check-label" for="remember">
                              Remember Email
                          </small>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <a href="#" class="text-danger float-end"> <small>Kehilangan Password</small> </a>
                  </div>
              </div>
              
                <div class="row mb-5 d-flex justify-content-center">
                  <div class="col-md-11">
                    <button type="submit" class="btn btn-register p-3 mb-5 w-100">Masuk</button>
                    <small class="form-check-label mt-5" >
                      Log in menggunakan akun anda pada:
                  </small>
                  <div class="mt-auto">
                    <button type="button" class="btn btn-secondary w-100 mt-2 p-3">
                      <img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-google-icon-logo-png-transparent-svg-vector-bie-supply-14.png" class="rounded-circle" style="width:30px;height:30px; background-color:white;padding:5px;" alt=""> Google
                    </button>
                  </div>
      
                  </div>
                </div>
            </div>
        
          </form>
          </div>
        </div>
      </div>
    <!-- Modal -->
<div class="modal fade" id="modalPinjam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Peminjaman Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tampilkan pesan error validasi -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @auth
                <form action="{{ route('landingpage.store') }}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="title" class="col-md-6 col-form-label">Nama Buku <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{ $book->title }}" disabled>
                            <input type="hidden" name="book_id" class="form-control" id="title" value="{{ $book->id }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="user" class="col-md-6 col-form-label">Nama Peminjam <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="hidden" name="user_id" class="form-control" id="tanggal_peminjaman" value="{{ Auth::user()->id }}">
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_peminjaman" class="col-md-6 col-form-label">Tanggal Peminjaman <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="date" name="tanggal_pinjam" class="form-control" id="tanggal_peminjaman" required>
                            
                        </div>
                        <small class="text-muted mt-3">*Batas waktu pengembalian adalah 1 minggu (7 hari) setelah tanggal peminjaman.</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-register btn-sm">Submit</button>
            </div>
            </form>
            @endauth
        </div>
    </div>
</div>


@endsection
