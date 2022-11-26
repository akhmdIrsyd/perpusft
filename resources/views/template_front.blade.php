<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Perpustakaan FT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href=" {{ asset('lib/animate/animate.min.css') }}  " rel="stylesheet">
    <link href=" {{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }} " rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }} " rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }} " rel="stylesheet">

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Perpus-FT</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="/list_buku" class="nav-item nav-link">Sumbang Buku</a>

            </div>
    </nav>
    <!-- Navbar End -->


    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="https://unmul.ac.id/">Universitas Mulawarman</a>
                    <a class="btn btn-link" href="https://ft.unmul.ac.id/">Fakultas Teknik</a>
                    <a class="btn btn-link" href="http://perpustakaan.unmul.ac.id/portal_teknik/">Perpustakaan Teknik</a>
                    <a class="btn btn-link" href="http://digilib.unmul.ac.id/etd_teknik/">Digital Library</a>
                    <a class="btn btn-link" href="http://e-lib.unmul.ac.id/teknik_opac/">e-lib Unmul</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Alamat Kampus
                        Kampus Gunung Kelua
                        Jalan Sambaliung No.9 Samarinda 75119</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>Telp. (0541) 736834</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>Fax (0541) 749315</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i> fteknik.unmul@ft.unmul.ac.id</p>
                    
                </div>


            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="https://ft.unmul.ac.id/">Fakultask Teknik Universitas Mulawarman</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br><br>
                        Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="/">Home</a>
                            <a href="/list_buku">Sumbang Buku</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }} "></script>
    <script src="{{ asset('lib/easing/easing.min.js') }} "></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }} "></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }} "></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src=" {{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    @yield('extrajs')
</body>

</html>