@include('layout.header')
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
                                        @foreach ($biotaWiValues as $wiData)
                                            <tr class="text-center">
                                                <td>{{ $wiData['parameter'] }}</td>
                                                <td>{{ $wiData['baku_mutu'] }}</td>
                                                <td>{{ $wiData['SVi'] }}</td>
                                                <td>1</td>
                                                <td>{{ number_format($wiData['Vi'], 5, ',', ' ') }}</td>
                                                <td>{{ number_format($wiData['k'], 5, ',', ' ') }}</td>
                                                <td>{{ number_format($wiData['Wi'], 5, ',', ' ') }}</td>
                                            </tr>
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
                                                <th>Wi*Qi-{{ $isi }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($biotaResults['parameters_data'] as $paramData)
                                            <tr>
                                                <td>{{ $paramData['parameter'] }}</td>
                                                <td>{{ number_format($paramData['Wi'], 5, ',', ' ') }}</td>

                                                @foreach ($sample as $sampleIndex)
                                                    @php
                                                        // Ambil nilai Wi*Qi dari data yang sudah diproses oleh service class
                                                        $displayValue = $paramData['sample_data'][$sampleIndex]['wiqi'] ?? 0;
                                                    @endphp
                                                    <td>{{ number_format($displayValue, 5, ',', ' ') }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        
                                        <tr>
                                            <td class="table-warning">WQIA</td>
                                            <td class="table-secondary">Jumlah</td>
                                            @foreach ($sample as $isi)
                                                <td class="table-secondary">
                                                    <b>{{ number_format($biotaResults['WQIA'][$isi], 2, ',', ' ') }}</b>
                                                </td>
                                            @endforeach
                                        </tr>
                                        
                                        <tr>
                                            <td class="table-warning">WQIAU</td>
                                            <td class="table-secondary">Jumlah</td>
                                            @foreach ($sample as $isi)
                                                <td class="table-secondary">
                                                    <b>{{ number_format($biotaResults['WQIAU'][$isi], 5, ',', ' ') }}</b>
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="row my-3">
                                <div class="col-2">Min = {{ number_format($biotaStats['min'], 2, ',', ' ') }}</div>
                                <div class="col-2">Mean = {{ number_format($biotaStats['mean'], 2, ',', ' ') }}</div>
                                <div class="col-2">Max = {{ number_format($biotaStats['max'], 2, ',', ' ') }}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12">
                                    <b>Kesimpulan:</b>
                                    <p>
                                        Nilai CWQI berkisar diantara
                                        <b>{{ number_format($biotaStats['min'], 2, ',', ' ') }} -
                                            {{ number_format($biotaStats['max'], 2, ',', ' ') }}</b>, sehingga dapat
                                        dikatakan kualitas air pesisir
                                        untuk biota laut berada pada tingkat yang <b> {{ $biotaStats['status'] }} </b> pada tahun
                                        {{ $data->first()->get_year->tahun }}.
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
                                        @foreach ($wisataWiValues as $wiData)
                                            <tr class="text-center">
                                                <td>{{ $wiData['parameter'] }}</td>
                                                <td>{{ $wiData['baku_mutu'] }}</td>
                                                <td>{{ number_format($wiData['SVi'], 3, ',', ' ') }}</td>
                                                <td>1</td>
                                                <td>{{ number_format($wiData['Vi'], 5, ',', ' ') }}</td>
                                                <td>{{ number_format($wiData['k'], 5, ',', ' ') }}</td>
                                                <td>{{ number_format($wiData['Wi'], 5, ',', ' ') }}</td>
                                            </tr>
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
                                                <th>Wi*Qi-{{ $isi }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($wisataResults['parameters_data'] as $paramData)
                                            <tr>
                                                <td>{{ $paramData['parameter'] }}</td>
                                                <td>{{ number_format($paramData['Wi'], 5, ',', ' ') }}</td>

                                                @foreach ($sample as $sampleIndex)
                                                    @php
                                                        // Ambil nilai Wi*Qi dari data yang sudah diproses oleh service class
                                                        $displayValue = $paramData['sample_data'][$sampleIndex]['wiqi'] ?? 0;
                                                    @endphp
                                                    <td>{{ number_format($displayValue, 5, ',', ' ') }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        
                                        <tr>
                                            <td class="table-warning">WQIA</td>
                                            <td class="table-secondary">Jumlah</td>
                                            @foreach ($sample as $isi)
                                                <td class="table-secondary">
                                                    <b>{{ number_format($wisataResults['WQIA'][$isi], 2, ',', ' ') }}</b>
                                                </td>
                                            @endforeach
                                        </tr>
                                        
                                        <tr>
                                            <td class="table-warning">WQIAU</td>
                                            <td class="table-secondary">Jumlah</td>
                                            @foreach ($sample as $isi)
                                                <td class="table-secondary">
                                                    <b>{{ number_format($wisataResults['WQIAU'][$isi], 5, ',', ' ') }}</b>
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="row my-3">
                                <div class="col-2">Min = {{ number_format($wisataStats['min'], 2, ',', ' ') }}</div>
                                <div class="col-2">Mean = {{ number_format($wisataStats['mean'], 2, ',', ' ') }}</div>
                                <div class="col-2">Max = {{ number_format($wisataStats['max'], 2, ',', ' ') }}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12">
                                    <b>Kesimpulan:</b>
                                    <p>
                                        Nilai CWQI berkisar diantara
                                        <b>{{ number_format($wisataStats['min'], 2, ',', ' ') }} -
                                            {{ number_format($wisataStats['max'], 2, ',', ' ') }}</b>, sehingga dapat
                                        dikatakan kualitas air pesisir
                                        untuk wisata bahari berada pada tingkat yang <b>
                                            {{ $wisataStats['status'] }} </b> pada tahun
                                        {{ $data->first()->get_year->tahun }}.
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
@include('layout.footer')

@include('layout.script')

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
</body>

</html>