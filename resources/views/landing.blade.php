@include('layout-landing.header')

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" data-aos="fade-up">
        <h2>Selamat Datang di Sistem Informasi</h2>
        <h1>Indeks Kualitas Air Pesisir</h1>
        <a href="#about" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Services Section ======= -->
    <section id="about" class="services">
        <div class="container">
            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Tentang Sistem</h2>
                <p>
                    Sistem ini dirancang berbasis web yang dapat mempercepat serta mempermudah pihak
                    terkait untuk menentukan/menghitung indeks kualitas air pesisir dan laut.
                </p>
            </div>

            <div class="row text-center">
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up">
                        <h4 class="title"><a href="">Metode Coastal Water Quality Index (CWQI)</a></h4>
                        <p class="description">
                            penerapan metode ini untuk menentukan status kualitas air pesisir dan laut pada
                            setiap titik berdasarkan data pemantauan yang dimiliki masing-masing titik.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <h4 class="title"><a href="">Media Informasi</a></h4>
                        <p class="description">
                            penyampaian informasi mengenai kualitas air pesisir dan laut ditampilkan secara
                            jelas, informatif, dan interaktif sehingga akan lebih mudah untuk diterima bagi
                            seluruh masyarakat.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <h4 class="title"><a href="">Media Penyajian</a></h4>
                        <p class="description">
                            status kualitas air pesisir dan laut ini ditampilkan dalam bentuk tabel dan
                            peta titik pemantauan untuk meningkatkan informasi yang diterima dari data
                            pemantauan kualitas air pesisir dan laut.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Services Section -->


    <!-- ======= Services Section ======= -->
    <section id="kurva" class="services">
        <div class="container">
            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Kurva Uji Air</h2>
                <p>
                    Berikut beberapa sampel parameter uji air yang divisualisasikan dalam bentuk kurva.
                </p>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs justify-content-center mt-5">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#ph">pH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#salinitas">Salinitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#do">DO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#amonia">Ammonia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#nitrat">Nitrate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#nitrit">Nitrite</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tts">TTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#turbudity">Turbudity</a>
                    </li>
                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane container active" id="ph">
                        <div class='my-3 pt-3'>
                            <p class="text-center mb-3">Kurva PH</p>
                            <img src="{{asset('landing/kurva/kurva-ph.png')}}" class="w-50" alt="" srcset="">
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="salinitas">
                        <div class='my-3 pt-3'>
                            <p class="text-center mb-3">Kurva Salinitas</p>
                            <img src="{{asset('landing/kurva/kurva-salinitas.png')}}" class="w-50" alt="" srcset="">
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="do">
                        <div class='my-3 pt-3'>
                            <p class="text-center mb-3">Kurva DO</p>
                            <img src="{{asset('landing/kurva/kurva-do.png')}}" class="w-50" alt="" srcset="">
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="amonia">
                        <div class='my-3 pt-3'>
                            <p class="text-center mb-3">Kurva Ammonia</p>
                            <img src="{{asset('landing/kurva/kurva-amonia.png')}}" class="w-50" alt="" srcset="">
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="nitrat">
                        <div class='my-3 pt-3'>
                            <p class="text-center mb-3">Kurva Nitrate</p>
                            <img src="{{asset('landing/kurva/kurva-nitrat.png')}}" class="w-50" alt="" srcset="">
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="nitrit">
                        <div class='my-3 pt-3'>
                            <p class="text-center mb-3">Kurva Nitrite</p>
                            <img src="{{asset('landing/kurva/kurva-amonia.png')}}" class="w-50" alt="" srcset="">
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="tts">
                        <div class='my-3 pt-3'>
                            <p class="text-center mb-3">Kurva TTS</p>
                            <img src="{{asset('landing/kurva/kurva-tts.png')}}" class="w-50" alt="" srcset="">
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="turbudity">
                        <div class='my-3 pt-3'>
                            <p class="text-center mb-3">Kurva Turbidity</p>
                            <img src="{{asset('landing/kurva/kurva-turbudity.png')}}" class="w-50" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->

</main><!-- End #main -->

@include('layout-landing.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

@include('layout-landing.script')

</body>

</html>
