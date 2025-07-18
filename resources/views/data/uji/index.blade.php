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
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Data Hasil Uji</h4>
                            </div>
                            <button type="button" class="btn btn-primary rounded-pill" data-toggle="modal"
                                data-target="#create">
                                Add New
                            </button>

                            {{-- Modal Create --}}
                            @include('data.uji.create')

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="2%">No</th>
                                            <th>Nama Pulau</th>
                                            <th>Tahun</th>
                                            <th>Lokasi</th>
                                            <th width="20%">Data Uji</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;

                                        foreach ($data as $uji) {
                                            $id = $uji->id;
                                        ?>
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $uji->pulau->nama }}</td>
                                            <td>{{ $uji->tahun }}</td>
                                            <td>{{ $uji->pulau->alamat }}</td>
                                            <td>
                                                @if (count($uji->sample) > 0)
                                                    <a href="" class="btn btn-warning btn-sm mb-2"
                                                        data-toggle="modal"
                                                        data-target="#edit_parameter{{ $id }}">Edit
                                                        Parameter
                                                    </a>
                                                    <a href="" class="btn btn-info btn-sm mb-2"
                                                        data-toggle="modal"
                                                        data-target="#add_sampeluji{{ $id }}">Input Sampel Uji
                                                    </a>
                                                @else
                                                    <a href="" class="btn btn-primary btn-sm mb-2"
                                                        data-toggle="modal"
                                                        data-target="#pilih_parameter{{ $id }}">Pilih
                                                        Parameter
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="iq-icons-list m-0 text-left" href="" title="Edit"
                                                    data-toggle="modal" data-target="#edit{{ $id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="m-0">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>

                                                {{-- Modal Parameter --}}
                                                @include('data.uji.add-parameter')
                                                @include('data.uji.edit-parameter')
                                                @include('data.uji.add-sampeluji')
                                                @include('data.uji.edit')
                                            </td>
                                            <td>
                                                <a class="iq-icons-list m-0 text-danger text-left" href="#" onclick="hapus({{$id}})" title="Hapus">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>                                                      
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $no += 1;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
@elseif (session('successDelete'))
    <script>
        swal({
            icon: "success",
            title: "Delete Success!",
            text: "{{ session('successDelete') }}",
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
<script>
    function hapus(id) {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover it!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    // console.log("{{route('delete-uji')}}/"+id)
                    window.location.href = "{{route('delete-uji')}}/"+id
                } else {
                    swal("Your data is safe!");
                }
            });
    }
</script>
<!-- /Alert -->

</body>

</html>
