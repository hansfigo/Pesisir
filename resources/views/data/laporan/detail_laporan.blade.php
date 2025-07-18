@include('layout.header')
<!-- Wrapper Start -->
<div class="wrapper">
    @include('layout.sidebar')
    @include('layout.topnav')

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center pb-0">
                            <div class="header-title">
                                <h4 class="card-title">Hasil Laporan</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <h5 class="mb-3">Golongan Parameter : Biota Laut</h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center table-active">
                                            <th>Parameter</th>
                                            <th>Baku Mutu</th>
                                            <th>Nilai Ambang Batas (SVi)</th>
                                            <th>Normalized</th>
                                            <th>Vi = 1/SVi</th>
                                            <th>k = 1/∑Vi</th>
                                            <th>Wi = k/SVi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalVi = 0;
                                        @endphp
                                        @foreach ($data as $laporan)
                                            @if ($laporan->param->jenis == 'biota' && $laporan->uji_ke == 1)
                                                @php
                                                    $Vi = round(1 / ($laporan->get_data->nilai==''?1:$laporan->get_data->nilai), 5);
                                                    if(in_array($laporan->param->id,[13,14])) {
                                                        $Vi = round(1 / ($laporan->get_data->nilai==''?0.001:($laporan->get_data->nilai*1000)), 5);
                                                    }
                                                    $totalVi += $Vi;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @foreach ($data as $laporan)
                                            @if ($laporan->param->jenis == 'biota' && $laporan->uji_ke == 1)
                                                @php
                                                    $SVi = ($laporan->get_data->nilai==''?1:$laporan->get_data->nilai);
                                                    if(in_array($laporan->param->id,[13,14])) {
                                                        $SVi = ($laporan->get_data->nilai==''?0.001:$laporan->get_data->nilai)*1000;
                                                    }
                                                    $Vi = round(1 / $SVi, 4);
                                                    $k = 1 / $totalVi;
                                                @endphp
                                                <tr class="text-center">
                                                    <td>{{ $laporan->param->parameter }}</td>
                                                    <td>{{ $laporan->get_data->baku_mutu }}</td>
                                                    <td>
                                                        {{ number_format($SVi, 2, ',', ' ') }}
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        {{ number_format($Vi, 5, ',', ' ') }}
                                                    </td>
                                                    <td>{{ number_format($k, 5, ',', ' ') }}</td>
                                                    <td>{{ number_format($k / $SVi, 5, ',', ' ') }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <h5 class="mb-3">Nilai CWQI</h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center table-active">
                                            <th>Parameter</th>
                                            <th>Wi</th>
                                            @foreach ($sample as $isi)
                                                <th>Wi*Qi-{{$isi}}</th>
                                            @endforeach
                                            {{-- <th>Wi*Qi-2</th>
                                            <th>Wi*Qi-3</th>
                                            <th>Wi*Qi-4</th>
                                            <th>Wi*Qi-5</th>
                                            <th>Wi*Qi-6</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                            $WQIA = [];
                                            $WQIAU = [];
                                            // $Wi = [];
                                            $hasil = [];
                                        @endphp
                                        @foreach ($data as $laporan)
                                            @if ($laporan->param->jenis == 'biota' && $laporan->uji_ke == 1)
                                                @php
                                                foreach ($sample as $isi) {
                                                    $SVi = ($laporan->get_data->nilai==''?1:$laporan->get_data->nilai);
                                                    if(in_array($laporan->param->id,[13,14])) {
                                                        $SVi = ($laporan->get_data->nilai==''?0.001:$laporan->get_data->nilai)*1000;
                                                    }
                                                    $Vi = round(1 / $SVi, 2);
                                                    $k = 1 / $totalVi;
                                                    $Wi = $k / $SVi;
                                                    
                                                    // Nilai Y didapat dari perkalian sampel dengan kurva tiap parameter
                                                    if ($laporan->param->id == 11) {
                                                        // 11 = BOD5
                                                        $nilaiY = 1.01040745922865 * exp(-0.116995811136413 * $parameter['biota'][$laporan->id_parameter][$isi]);
                                                    } elseif ($laporan->param->id == 12) {
                                                        // 12 = Amonia total
                                                        $nilaiY = 1.010498667279 * exp(-0.0077965531620728 * $parameter['biota'][$laporan->id_parameter][$isi]);
                                                    } elseif ($laporan->param->id == 13) {
                                                        // 13 = Ortofosfat
                                                        $nilaiY = 0.981085972533536 * exp(-0.153725962938623 * $parameter['biota'][$laporan->id_parameter][$isi]);
                                                    } elseif ($laporan->param->id == 14) {
                                                        // 14 = Nitrat
                                                        $nilaiY = 1.01050605076391 * exp(-0.292728289588808 * $parameter['biota'][$laporan->id_parameter][$isi]);
                                                    } else {
                                                        $nilaiY = 0;
                                                    }
                                                    
                                                    // Nilai y * 100 * nilai Wi (diklai 100 untung menghilangkan 0 di depan angka)
                                                    $hasil[$isi] = $nilaiY * 100 * $Wi;
                                                    $x = $nilaiY * 100;
                                                    
                                                    // Total Nilai akhir
                                                    $WQIA[$isi] = empty($WQIA[$isi]) ? 0 : $WQIA[$isi];
                                                    $WQIA[$isi] += $hasil[$isi];
                                                    
                                                    // Total Nilai perkalian nilaiY *100
                                                    $WQIAU[$isi] = empty($WQIAU[$isi]) ? 0 : $WQIAU[$isi];
                                                    $WQIAU[$isi] += $x;
                                                }
                                                @endphp
                                                <tr>
                                                    <td>{{ $laporan->param->parameter }}</td>
                                                    <td>{{ number_format($Wi, 5, ',', ' ') }}</td>
                                                    @foreach ($sample as $isi)
                                                        <td>{{ number_format($hasil[$isi], 5, ',', ' ') }}</td>
                                                    @endforeach
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td class="table-warning">WQIA</td>
                                            <td class="table-secondary">Jumlah</td>
                                            @foreach ($sample as $isi)
                                                <td class="table-secondary">
                                                    <b>{{ number_format($WQIA[$isi], 2, ',', ' ') }}</b>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="table-warning">WQIAU</td>
                                            <td class="table-secondary">Jumlah</td>
                                            @foreach ($sample as $isi)
                                                <td class="table-secondary">
                                                    <b>{{ number_format($WQIAU[$isi] / 4, 5, ',', ' ') }}</b>
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row my-3">
                                @php
                                    $min = number_format(min($WQIA), 2, ',', ' ');
                                    $mean = number_format(array_sum($WQIA)/count($WQIA), 2, ',', ' ');
                                    $max = number_format(max($WQIA), 2, ',', ' ');
                                @endphp
                                <div class="col-2">Min = {{number_format(min($WQIA), 2, ',', ' ')}}</div>
                                <div class="col-2">Mean = {{number_format(array_sum($WQIA)/count($WQIA), 2, ',', ' ')}}</div>
                                <div class="col-2">Max = {{number_format(max($WQIA), 2, ',', ' ')}}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12">
                                    <b>Kesimpulan:</b>
                                    <p>
                                        Nilai CWQI berkisar diantara <b>{{$min}} - {{$max}}</b>, sehingga dapat dikatakan kualitas air pesisir
                                        untuk biota laut berada pada tingkat yang <b> {{ hitung($max) }} </b> pada tahun
                                        {{ $laporan->get_year->tahun }}.
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="card-body">
                            <h5 class="mb-3">Golongan Parameter : Wisata Bahari</h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center table-active">
                                            <th>Parameter</th>
                                            <th>Baku Mutu</th>
                                            <th>Nilai Ambang Batas (SVi)</th>
                                            <th>Normalized</th>
                                            <th>Vi = 1/SVi</th>
                                            <th>k = 1/∑Vi</th>
                                            <th>Wi = k/SVi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalVi = 0;
                                        @endphp
                                        @foreach ($data as $laporan)
                                            @if ($laporan->param->jenis == 'wisata' && $laporan->uji_ke == 1)
                                                @php
                                                    $Vi = round(1 / ($laporan->get_data->nilai==''?1:$laporan->get_data->nilai), 5);
                                                    if(in_array($laporan->param->id,[53,54])) {
                                                        $Vi = round(1 / ($laporan->get_data->nilai==''?0.001:($laporan->get_data->nilai*1000)), 5);
                                                    }
                                                    $totalVi += $Vi;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @foreach ($data as $laporan)
                                            @if ($laporan->param->jenis == 'wisata' && $laporan->uji_ke == 1)
                                                @php
                                                    $SVi = ($laporan->get_data->nilai==''?1:$laporan->get_data->nilai);
                                                    if(in_array($laporan->param->id,[53,54])) {
                                                        $SVi = ($laporan->get_data->nilai==''?0.001:$laporan->get_data->nilai)*1000;
                                                    }
                                                    $Vi = round(1 / $SVi, 4);
                                                    $k = 1 / $totalVi;
                                                @endphp
                                                <tr class="text-center">
                                                    <td>{{ $laporan->param->parameter }}</td>
                                                    <td>{{ $laporan->get_data->baku_mutu }}</td>
                                                    <td>
                                                        {{ number_format($SVi, 2, ',', ' ') }}
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        {{ number_format($Vi, 5, ',', ' ') }}
                                                    </td>
                                                    <td>{{ number_format($k, 5, ',', ' ') }}</td>
                                                    <td>{{ number_format($k / $SVi, 5, ',', ' ') }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <h5 class="mb-3">Nilai CWQI</h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center table-active">
                                            <th>Parameter</th>
                                            <th>Wi</th>
                                            @foreach ($sample as $isi)
                                                <th>Wi*Qi-{{$isi}}</th>
                                            @endforeach
                                            {{-- <th>Wi*Qi-2</th>
                                            <th>Wi*Qi-3</th>
                                            <th>Wi*Qi-4</th>
                                            <th>Wi*Qi-5</th>
                                            <th>Wi*Qi-6</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                            $WQIA = [];
                                            $WQIAU = [];
                                            // $Wi = [];
                                            $hasil = [];
                                        @endphp
                                        @foreach ($data as $laporan)
                                            @if ($laporan->param->jenis == 'wisata' && $laporan->uji_ke == 1)
                                                @php
                                                foreach ($sample as $isi) {
                                                    $SVi = ($laporan->get_data->nilai==''?1:$laporan->get_data->nilai);
                                                    if(in_array($laporan->param->id,[53,54])) {
                                                        $SVi = ($laporan->get_data->nilai==''?0.001:$laporan->get_data->nilai)*1000;
                                                    }
                                                    $Vi = round(1 / $SVi, 2);
                                                    $k = 1 / $totalVi;
                                                    $Wi = $k / $SVi;
                                                    
                                                    // Nilai Y didapat dari perkalian sampel dengan kurva tiap parameter
                                                    if ($laporan->param->id == 51) {
                                                        // 11 = BOD5
                                                        $nilaiY = 1.01008344901325 * exp(-0.234070386744694 * $parameter['wisata'][$laporan->id_parameter][$isi]);
                                                    } elseif ($laporan->param->id == 52) {
                                                        // 12 = Amonia total
                                                        $nilaiY = 1.010498667279 * exp(-0.0077965531620728 * $parameter['wisata'][$laporan->id_parameter][$isi]);
                                                    } elseif ($laporan->param->id == 53) {
                                                        // 13 = Ortofosfat
                                                        $nilaiY = 0.981085972533536 * exp(-0.153725962938623 * $parameter['wisata'][$laporan->id_parameter][$isi]);
                                                    } elseif ($laporan->param->id == 54) {
                                                        // 14 = Nitrat
                                                        $nilaiY = 1.01050605076391 * exp(-0.292728289588808 * $parameter['wisata'][$laporan->id_parameter][$isi]);
                                                    } else {
                                                        $nilaiY = 0;
                                                    }
                                                    
                                                    // Nilai y * 100 * nilai Wi (diklai 100 untung menghilangkan 0 di depan angka)
                                                    $hasil[$isi] = $nilaiY * 100 * $Wi;
                                                    $x = $nilaiY * 100;

                                                    // Total Nilai akhir
                                                    $WQIA[$isi] = empty($WQIA[$isi]) ? 0 : $WQIA[$isi];
                                                    $WQIA[$isi] += $hasil[$isi];
                                                    
                                                    // Total Nilai perkalian nilaiY *100
                                                    $WQIAU[$isi] = empty($WQIAU[$isi]) ? 0 : $WQIAU[$isi];
                                                    $WQIAU[$isi] += $x;
                                                }
                                                @endphp
                                                <tr>
                                                    <td>{{ $laporan->param->parameter }}</td>
                                                    <td>{{ number_format($Wi, 5, ',', ' ') }}</td>
                                                    @foreach ($sample as $isi)
                                                        <td>{{ number_format($hasil[$isi], 5, ',', ' ') }}</td>
                                                    @endforeach
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td class="table-warning">WQIA</td>
                                            <td class="table-secondary">Jumlah</td>
                                            @foreach ($sample as $isi)
                                                <td class="table-secondary">
                                                    <b>{{ number_format($WQIA[$isi], 2, ',', ' ') }}</b>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="table-warning">WQIAU</td>
                                            <td class="table-secondary">Jumlah</td>
                                            @foreach ($sample as $isi)
                                                <td class="table-secondary">
                                                    <b>{{ number_format($WQIAU[$isi] / 4, 5, ',', ' ') }}</b>
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row my-3">
                                @php
                                    $min = number_format(min($WQIA), 2, ',', ' ');
                                    $mean = number_format(array_sum($WQIA)/count($WQIA), 2, ',', ' ');
                                    $max = number_format(max($WQIA), 2, ',', ' ');
                                @endphp
                                <div class="col-2">Min = {{number_format(min($WQIA), 2, ',', ' ')}}</div>
                                <div class="col-2">Mean = {{number_format(array_sum($WQIA)/count($WQIA), 2, ',', ' ')}}</div>
                                <div class="col-2">Max = {{number_format(max($WQIA), 2, ',', ' ')}}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12">
                                    <b>Kesimpulan:</b>
                                    <p>
                                        Nilai CWQI berkisar diantara <b>{{$min}} - {{$max}}</b>, sehingga dapat dikatakan kualitas air pesisir
                                        untuk biota laut berada pada tingkat yang <b> {{ hitung($max) }} </b> pada tahun
                                        {{ $laporan->get_year->tahun }}.
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Wrapper End-->
@include('layout.footer')

<!-- Backend Bundle JavaScript -->
@include('layout.script')

<!-- Add alert -->
@if (session('successAdd'))
    <script>
        swal({
            icon: 'success',
            title: "Add Success!",
            text: "{{ session('successAdd') }}",
            button: false,
            timer: 3500
        })
    </script>
@elseif (session('successUpdate'))
    <script>
        swal({
            icon: "success",
            title: "Update Success!",
            text: "{{ session('successUpdate') }}",
            button: false,
            timer: 3500
        })
    </script>
@elseif (session('delete'))
    <script>
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover it!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("{{ session('delete') }}", {
                        icon: "success",
                        button: false,
                        timer: 3500
                    });
                } else {
                    swal("Your data is safe!");
                }
            });
    </script>
@endif
<!-- /Alert -->

</body>

</html>
