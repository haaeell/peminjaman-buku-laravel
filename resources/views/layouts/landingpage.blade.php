<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>

<link rel="stylesheet" href="{{asset('./css/app.css')}}">
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">


</head>
<body>
   
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-md fixed-top py-3" >
    <div class="container">
      <img src="https://www.freeiconspng.com/img/49584" width="50px" alt="">
      <a class="navbar-brand fw-bold title"  href="#">BUKUKU.ID</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto me-4 ">
          <li class="nav-item ">
            <a class="nav-link active nav-huy fw-semibold" aria-current="page" href="/">Home </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link nav-huy fw-semibold" href="{{route('landingpage.create')}}">Daftar Buku</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Kategori 
            </a>
            <ul class="dropdown-menu">
                @foreach($categories as $category)
                <li>
                    <a class="dropdown-item" href="#">{{$category->name}}</a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="nav-item ">
            <a class="nav-link nav-huy fw-semibold" href="#blog">Tentang kami </a>
          </li>
        
        @auth
          <li class="nav-item ">
            <a class="nav-link nav-huy fw-semibold" href="{{route('riwayat.index')}}">Riwayat </a>
          </li>
          @endauth
        </ul>

        <ul class="navbar-nav ms-auto">
          
          @if (Route::has('login'))
            
                @auth
                @if (Auth::user()->role_id == '1' )
                   <li class="nav-item">
                  <a class="btn btn-login" href="{{ url('home') }}">Dashboard X {{Auth::user()->name}}  <i class="bi bi-box-arrow-in-right"></i></a>
                </li> 
                @else 
                <form  action="{{ route('logout') }}" method="POST" >
                  @csrf
                  <button type="submit" class="btn btn-dark btn-register">logout</button>
              </form>
                @endif
                
                @else
                <li class="nav-item">
                  <button class="btn btn-login" data-bs-toggle="modal" data-bs-target="#exampleModal" >Login</button>
                  <a class="btn btn-register" href="{{ route('register') }}">Sign Up</a>
                </li>
                @endauth
            
        @endif
        </ul>
        
      </div>
    </div>
  </nav>

 @yield('content')
 <!-- Modal -->
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

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
 
  
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('script')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
 <script>
  $(document).ready( function () {
  $('#table_id').DataTable();
} );

</script>
<script>
    var swiper = new Swiper(".mySwiper", {
      // loop: true,
      initialSlide: 2,
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
    document.querySelector(".swiper-button-next").addEventListener("click", function () {
  swiper.slideNext();
});

document.querySelector(".swiper-button-prev").addEventListener("click", function () {
  swiper.slidePrev();
});

</script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
