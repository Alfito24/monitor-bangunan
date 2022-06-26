@extends('template.main-landing')
@section('title-name', 'Home')
@section('header')
    @include('template.header-landing')
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Welcome to Social Benefit in Residential Building Survey</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Please add your project or take a survey</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            @if (Auth::check() && Auth::user()->kategori=='pemilik')
                            <a href="/project/add"
                            class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Add Project</span>
                            <i class="bi bi-arrow-right"></i>
                            </a>
                            @elseif(Auth::check())
                            <a href="/pilihproyek"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Take a Survey</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="landing/assets/img/cosntruction.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <!-- <section id="about" class="about">

                                <div class="container" data-aos="fade-up">
                                <div class="row gx-0">

                                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                                <div class="content">
                                <h3>Who We Are</h3>
                                <h2>Expedita voluptas omnis cupiditate totam eveniet nobis sint iste. Dolores est repellat corrupti reprehenderit.</h2>
                                <p>
                                Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit voluptatum nam et est corrupti.
                                </p>
                                <div class="text-center text-lg-start">
                                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                  <span>Read More</span>
                                  <i class="bi bi-arrow-right"></i>
                                </a>
                                </div>
                                </div>
                                </div>

                                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                                <img src="assets/img/about.jpg" class="img-fluid" alt="">
                                </div>

                                </div>
                                </div>

                                </section>End About Section -->

        <!-- ======= Values Section ======= -->
        

    </main><!-- End #main -->
@endsection


@section('footer')
    @include('template.footer-landing')
@endsection

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="landing/assets/vendor/purecounter/purecounter.js"></script>
<script src="landing/assets/vendor/aos/aos.js"></script>
<script src="landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="landing/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="landing/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="landing/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="landing/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="landing/assets/js/main.js"></script>

</body>

</html>
