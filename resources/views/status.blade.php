@include('layout-landing.header')

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" data-aos="fade-up">
        <h1>Status</h1>
        <h2>Indeks Kualitas Air Pesisir</h2>
        <a class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Services Section ======= -->
    <section>
        <div class="container">

            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Status Indeks Kualitas Air Pesisir</h2>
                <p>
                    Sistem ini dirancang berbasis web yang dapat mempercepat serta mempermudah pihak
                    terkait untuk menentukan/menghitung indeks kualitas air pesisir dan laut.
                </p>
            </div>

            @include('status_pesisir')
    </section><!-- End Services Section -->

</main><!-- End #main -->

@include('layout-landing.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

@include('layout-landing.script')

</body>

</html>
