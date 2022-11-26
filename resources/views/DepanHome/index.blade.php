@extends('template_front')

@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('img/teknik.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Selamat Datang</h5>
                            <h1 class="display-3 text-white animated slideInDown">Perpustakaan Fakultas Teknik</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('img/ftunmul2.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Selamat Datang</h5>
                            <h1 class="display-3 text-white animated slideInDown">Perpustakaan Fakultas Teknik</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                        <h5 class="mb-3">DIGITAL LIBARY</h5>
                        <p>Pencariaan Skripsi,Tesis dan desertasi dalam bentuk digital</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                        <h5 class="mb-3">E-Book</h5>
                        <p>Pencariaan Buku dalam bentuk digital</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-home text-primary mb-4"></i>
                        <h5 class="mb-3">E-Journal</h5>
                        <p>Pencariaan Journal dalam bentuk digital</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                        <h5 class="mb-3">OPAC</h5>
                        <p>Open Public Access Catalogue pencarian buku</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<!-- 
<div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Mendaftar</h6>
            <h1 class="mb-5">Sumbang Buku</h1>
        </div>
        <div class="container">
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#modalTambahmhs">SUMBANG BUKU</button>

            </div>
        </div>
    </div>
</div>
 -->



<!-- Categories Start -->
<div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Tahapan</h6>
            <h1 class="mb-5">Sumbang Buku</h1>
        </div>
        <div class="container py-5">
            <div class="main-timeline-4 text-white">
                <div class="timeline-4 left-4">
                    <div class="card gradient-custom">
                        <div class="card-body p-4">
                            <i class="fas fa-2x mb-3">1</i>
                            <p>
                                Mahasiswa memilih Buku yang akan di sumbang
                            </p>

                        </div>
                    </div>
                </div>
                <div class="timeline-4 right-4">
                    <div class="card gradient-custom-4">
                        <div class="card-body p-4">
                            <i class="fas fa-2x mb-3"> 2</i>
                            <p>
                                Mahasiswa Membeli Buku yang sudah di pilih
                            </p>
                        </div>
                    </div>
                </div>
                <div class="timeline-4 left-4">
                    <div class="card gradient-custom">
                        <div class="card-body p-4">
                            <i class="fas  fa-2x mb-3">3</i>
                            <p>
                                Mahasiswa membawa buku yang di beli ke perpustakaan untuk di verifikasi
                            </p>

                        </div>
                    </div>
                </div>
                <div class="timeline-4 right-4">
                    <div class="card gradient-custom-4">
                        <div class="card-body p-4">
                            <i class="fas  fa-2x mb-3">4</i>
                            <p>Perpustakaan mengeluarkan surat bebas pustaka
                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Categories Start -->
@include('DepanHome.create_mhs')


@endsection

@section('extrajs')

@endsection