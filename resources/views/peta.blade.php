@include('layout-landing.header')

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" data-aos="fade-up">
        <h1>Peta Persebaran</h1>
        <h2>Data Pesisir dan Laut yang sudah Diuji</h2>
        <a href="#about" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Services Section ======= -->
    <section id="maps" class="services">
        <div class="container">
            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Peta Sampel Uji Air</h2>
                <p>
                    Peta persebaran ini berdasarkan data pesisir dan laut yang sudah dilakukan uji kualitas air.
                </p>
            </div>

            <div class="row text-center">
                <div class="col-md-12 align-items-stretch mb-5 mb-lg-0">
                    <div id='map'></div>
                </div>

            </div>
        </div>
    </section><!-- End Services Section -->

</main><!-- End #main -->

@include('layout-landing.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

@include('layout-landing.script')
<script>
    let map, markers = [];

    function initMap() {
        map = L.map('map', {
            center: {
                lat: -7.7956, // Ganti dengan koordinat yang valid (contoh: Yogyakarta)
                lng: 110.3695,
            },
            zoom: 10
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        map.on('click', mapClicked);
        initMarkers();
    }
    
    initMap();

    /* --------------------------- Initialize Markers --------------------------- */
    function initMarkers() {
        const initialMarkers = @php echo json_encode($initialMarkers) @endphp;
        const validMarkers = [];
        
        // Loop pertama untuk memfilter data yang valid
        for (let index = 0; index < initialMarkers.length; index++) {
            const data = initialMarkers[index];
            const lat = data.position.lat;
            const lng = data.position.lng;
            
            // Pengecekan apakah lat dan lng itu angka
            if (!isNaN(parseFloat(lat)) && isFinite(lat) && !isNaN(parseFloat(lng)) && isFinite(lng)) {
                validMarkers.push(data);
            } else {
                console.error('Data marker tidak valid, dilewati:', data.title, data.position);
            }
        }
        
        // Sekarang, kita pakai data yang udah valid aja
        for (let index = 0; index < validMarkers.length; index++) {
            const data = validMarkers[index];
            const marker = generateMarker(data, index);
        
            marker.addTo(map).bindPopup(`<b>${data.title}<br>Status Air : ${data.status_air}</b>`);
            markers.push(marker); 
        }

        // Atur view map agar mencakup semua marker
        if (markers.length > 0) {
            const group = new L.featureGroup(markers);
            map.fitBounds(group.getBounds());
        }
    }
    
    function generateMarker(data, index) {
        return L.marker(data.position, {
                draggable: data.draggable
            })
            .on('click', (event) => markerClicked(event, index))
            .on('dragend', (event) => markerDragEnd(event, index));
    }

    /* ------------------------- Handle Map Click Event ------------------------- */
    function mapClicked($event) {
        console.log(map);
        console.log($event.latlng.lat, $event.latlng.lng);
    }

    /* ------------------------ Handle Marker Click Event ----------------------- */
    function markerClicked($event, index) {
        console.log(map);
        console.log($event.latlng.lat, $event.latlng.lng);
    }

    /* ----------------------- Handle Marker DragEnd Event ---------------------- */
    function markerDragEnd($event, index) {
        console.log(map);
        console.log($event.target.getLatLng());
    }
</script>

</body>

</html>
