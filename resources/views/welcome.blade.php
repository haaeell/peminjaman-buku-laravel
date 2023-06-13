@extends('layouts.landingpage')

@section('content')
    {{-- HERO --}}
    <section class="hero">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center vh-100">
                <div class="col-md-6">
                    <span class="badge1">Lorem ipsum dolor, sit amet </span>
                    <h1 class="fw-bold mt-3">Enjoy Borrowing Books Online!</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, nobis inventore dolorum ex
                        voluptatibus ducimus doloremque quo iste eos quam.</p>
                    <div class="d-flex gap-2">

                        <a href="{{ route('landingpage.create') }}" class="btn btn-register"> Koleksi Buku</a>
                        <a class="btn btn-book"><i class="bi bi-caret-right-fill"></i> Books</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('image/hero.png') }}" style="width: 100%" alt="">
                </div>
            </div>
        </div>
    </section>
    {{-- END HERO --}}
    {{-- ALASAN --}}
    <section>
        <div class="container">
            <div class="row d-flex justify-content-center ">
                <div class="col-md-10">
                    <div class="row alasan d-flex justify-content-center align-items-center shadow-lg">
                        <div class="col-md-4">
                            <div class="p-4 text-center">
                                <i class="bi bi-book-fill icon"></i>
                                <h5 class="fw-bold m-2">FREE SHIPPING</h5>
                                <P>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus impedit Lorem
                                    ipsum dolor sit amet </P>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-4 text-center">
                                <i class="bi bi-hand-thumbs-up-fill icon"></i>
                                <h5 class="fw-bold m-2">100% SATISFACTION</h5>
                                <P>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus impedit Lorem
                                    ipsum dolor sit amet </P>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-4 text-center">
                                <i class="bi bi-browser-safari icon"></i>
                                <h5 class="fw-bold m-2">EASY RETURN</h5>
                                <P>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus impedit Lorem
                                    ipsum dolor sit amet </P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    {{-- ALASAN --}}
    {{-- BUKU --}}
    <section class="vh-100 py-5 ">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-3">
                    <div class="card border-0">
                        <img src="{{ asset('image/buku1.jpg') }}" class="image-book shadow-lg" alt="">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <div class="isi-gambar shadow-lg p-4 d-flex flex-column align-items-center">
                                    <h4 class="fw-bold mb-2">Cahaya Matahari</h4>
                                    <p>Lorem ipsum dolor sit </p>
                                    <div class="fw-bold d-flex align-items-center">
                                        <span style="margin-right: 10px"><i class="bi bi-cart-fill"></i> 25 </span>
                                        <button class="btn-register">Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card border-0 p-5" >

                        <h4 class="fw-bold text-center mb-5" style="color: #124472;"> <i>Buku Terlaris Bulan ini</i> </h4>
                        <div class="row d-flex justify-content-center text-center mb-3">
                            <div class="col-md-3">
                                <div class="card-book p-2">
                                    <img src="{{ asset('image/hero.png') }}" width="100" alt="">
                                    <h6 class="mt-3 fw-semibold">Lorem ipsum dolor sit.</h6>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-book p-2">
                                    <img src="{{ asset('image/hero.png') }}" width="100" alt="">
                                    <h6 class="mt-3 fw-semibold">Lorem ipsum dolor sit.</h6>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-book p-2">
                                    <img src="{{ asset('image/hero.png') }}" width="100" alt="">
                                    <h6 class="mt-3 fw-semibold">Lorem ipsum dolor sit.</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center text-center">
                            <div class="col-md-3">
                                <div class="card-book p-2">
                                    <img src="{{ asset('image/hero.png') }}" width="100" alt="">
                                    <h6 class="mt-3 fw-semibold">Lorem ipsum dolor sit.</h6>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-book p-2">
                                    <img src="{{ asset('image/hero.png') }}" width="100" alt="">
                                    <h6 class="mt-3 fw-semibold">Lorem ipsum dolor sit.</h6>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-book p-2">
                                    <img src="{{ asset('image/hero.png') }}" width="100" alt="">
                                    <h6 class="mt-3 fw-semibold">Lorem ipsum dolor sit.</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- END BUKU --}}
    {{-- CARA MEMINJAM --}}
    <section>
        <div class="container">
            <h3 class="fw-bold text-center mb-5">Cara Meminjam Buku</h3>
            <div class="row d-flex justify-content-center" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                <div class="col-md-5">
                    <div class="card border-0  p-3">
                        <img src="{{ asset('image/tutor.png') }}" style="width: 80%" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card border-0 p-5" style="border-radius:16px;">
                        <div class="d-flex gap-3 align-items-center">
                            <p class="nomer text-center">1.</p>
                            <p>Cari Buku yang ingin kamu pinjam dari koleksi kami.</p>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <p class="nomer text-center">2.</p>
                            <p>Pilih Buku yang sesuai dengan minat dan kebutuhanmu.</p>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <p class="nomer text-center">3.</p>
                            <p>Tentukan tanggal peminjaman dan pengembalian buku.</p>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <p class="nomer text-center">4.</p>
                            <p>Isi formulir peminjaman dengan lengkap dan benar.</p>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <p class="nomer text-center">5.</p>
                            <p>Setelah mengisi formulir, tunggu konfirmasi dari kami.</p>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <p class="nomer text-center">6.</p>
                            <p>Jika permohonan peminjaman disetujui, ambil buku di toko</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- END CARA MEMINJAM --}}
    {{-- <section class="vh-100">
        <div class="container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card p-3">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, dicta!</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card p-3">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, dicta!</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card p-3">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, dicta!</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card p-3">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, dicta!</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card p-3">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, dicta!</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card p-3">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, dicta!</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section> --}}
    <section>
        <div class="container py-5 my-5">
            <h4 class="text-center  fw-bold  mb-5">TESTIMONI ORANG - ORANG</h4>
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-md-4">
                    <div class="card blur shadow-card border-1 p-4" >
                        <div class="d-flex justify-content-center mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="card-text text-center">" Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                        <div class="d-flex align-items-center justify-content-start mt-3">
                            <img src="{{ asset('stisla/assets') }}/img/avatar/avatar-5.png" class="rounded-circle me-3" alt="Profile Picture" style="width: 40px; height: 40px;">
                            <div class="d-flex flex-column">
                                <h5 class="fw-semibold text-center mb-0">Nama Pengguna</h5>
                                <span class="text-start" style="font-size: 13px;">12 November 2023</span>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 card shadow-card" >
                        <div class="d-flex justify-content-center mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half text-warning"></i>
                        </div>
                        <p class="card-text text-center">" Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, tempore ut. Delectus
                            "</p>
                        <div class="d-flex align-items-center justify-content-start mt-2">
                            <img src="{{ asset('stisla/assets') }}/img/avatar/avatar-5.png" class="rounded-circle me-3" alt="Profile Picture" style="width: 40px; height: 40px;">
                            <div class="d-flex flex-column">
                                <h5 class="fw-semibold text-start mb-0">Haikal</h5>
                                <span class="text-start" style="font-size: 13px;">12 November 2023</span>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card blur border-1 p-4 shadow-card">
                        <div class="d-flex justify-content-center mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="card-text text-center">" Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                        <div class="d-flex align-items-center justify-content-start mt-3">
                            <img src="{{ asset('stisla/assets') }}/img/avatar/avatar-5.png" class="rounded-circle me-3" alt="Profile Picture" style="width: 40px; height: 40px;">
                            <div class="d-flex flex-column">
                                <h5 class="fw-semibold text-center mb-0">Nama Pengguna</h5>
                                <span class="text-start" style="font-size: 13px;">12 November 2023</span>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
