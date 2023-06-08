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
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

</head>
<style>
   .swiper {
      width: 60%;
      height: 50%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 12px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .btn-register {
    padding: 12px 30px;
    border-radius: 8px;
    border: none;
    font-weight: 600;
}

.btn-login{
    padding: 12px 30px;
    border-radius: 8px;
    border: none;
    font-weight: 600;
}

.navbar li .btn-login {
    position: relative;
    display: inline-block;
  }
  
  .navbar li .btn-login:after {
    content: "";
    position: absolute;
    width: 0%;
    height: 2px;
    bottom: -2px;
    left: 25%;
    background-color: #000000;
    transition:  0.2s ease-in-out, left 0.2s ease-in-out;
    transform: translateX(-50%);
    
  }
  .navbar li .btn-login:hover:after {
    width: 50%;
    left: 50%;
  }

  .navbar li .nav-huy {
    position: relative;
    display: inline-block;
  }
  
  .navbar li .nav-huy:after {
    content: "";
    position: absolute;
    width: 0%;
    height: 2px;
    bottom: -2px;
    left: 50%;
    background-color: #000000;
    transition:  0.2s ease-in-out, left 0.2s ease-in-out;
    transform: translateX(-50%);
    
  }
  .navbar li .nav-huy:hover:after {
    width: 50%;
    left: 50%;
  }

</style>
<body>
   
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-md fixed-top py-3" >
    <div class="container">
      <img src="https://png.pngtree.com/template/20190316/ourmid/pngtree-books-logo-image_79143.jpg" width="50px" alt="">
      <a class="navbar-brand fw-bold" href="#">BUKUKU.ID</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto me-4 ">
          <li class="nav-item ">
            <a class="nav-link active nav-huy" aria-current="page" href="/">Home </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link nav-huy " href="{{route('landingpage.create')}}">Daftar Buku</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Kategori <i class="bi bi-caret-down-fill"></i>
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
            <a class="nav-link nav-huy " href="#blog">Tentang kami </a>
          </li>
        
        @auth
          <li class="nav-item ">
            <a class="nav-link nav-huy " href="#blog">Riwayat </a>
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
                  <a class="btn btn-login" href="{{ route('login') }}" >Login</a>
                  <a class="btn btn-dark btn-register" href="{{ route('register') }}">Sign Up</a>
                </li>
                @endauth
            
        @endif
        </ul>
        
      </div>
    </div>
  </nav>

 @yield('content')

    

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
      loop: true,
      slidesPerView: 2,
      spaceBetween: 30,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
    576: {
      slidesPerView: 1,
      spaceBetween: 20
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 30
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 10
    }
  }
    });

</script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
