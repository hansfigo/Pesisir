<div id="add_sampeluji{{ $id }}" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
    aria-labelledby="createTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTitle">Input Sampel Hasil Uji</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('add-hasil', base64_encode($id)) }}" class="needs-validation"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    <input type="hidden" name="id_uji" value="{{ $id }}">
                    <div id="main-form{{$id}}">
                        <?php $i=0 ?>
                        @foreach ($sampelUji as $outer)
                            @if ($i!=$outer->uji_ke && $outer->id_uji == $id)
                            <?php $i=$outer->uji_ke ?>
                            <div class="sample">
                                <div class="row mb-4 mx-auto justify-content-center">
                                    <h5>Masukkan Sampel ke-{{$outer->uji_ke}}</h5>
                                    @if ($i!=1)
                                        <a class="iq-icons-list text-danger remove mt-2 ml-2"
                                        href="#" type="button"
                                        title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="m-0">
                                                <path fill-rule="evenodd"
                                                    d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>BIOTA LAUT</h6>
                                        <hr>
                                        @foreach ($sampelUji as $data)
                                            @if ($data->param->jenis == 'biota' && $outer->uji_ke == $data->uji_ke && $data->id_uji == $id)
                                                <input type="hidden" name="id[{{$outer->uji_ke}}][]" value="{{ $data->id }}">
                                                <div class="form-row my-3">
                                                    <div class="col-5 m-auto">
                                                        <label for="validationTooltip05">{{ $data->param->parameter }}</label>
                                                    </div>
                                                    <input type="hidden" name="id_parameter[{{$outer->uji_ke}}][]"
                                                        value="{{ $data->id_parameter }}">
                                                    <div class="col-4">
                                                        <input type="number" step="0.01" min="0" class="form-control"
                                                            id="validationTooltip05" name="hasil[{{$outer->uji_ke}}][]"
                                                            value="{{ $data->hasil }}" required>
                                                    </div>
                                                    <div class="col-3 m-auto">
                                                        <label for="">{{ $data->get_data->satuan }}</label>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-sm-6">
                                        <h6>WISATA BAHARI</h6>
                                        <hr>
                                        @foreach ($sampelUji as $data)
                                            @if ($data->param->jenis == 'wisata' && $outer->uji_ke == $data->uji_ke && $data->id_uji == $id)
                                                <input type="hidden" name="id[{{$outer->uji_ke}}][]" value="{{ $data->id }}">
                                                <div class="form-row my-3">
                                                    <div class="col-5 m-auto">
                                                        <label for="validationTooltip05">{{ $data->param->parameter }}</label>
                                                    </div>
                                                    <input type="hidden" name="id_parameter[{{$outer->uji_ke}}][]"
                                                        value="{{ $data->id_parameter }}">
                                                    <div class="col-4">
                                                        <input type="number" step="0.01" min="0" class="form-control"
                                                            id="validationTooltip05" name="hasil[{{$outer->uji_ke}}][]"
                                                            value="{{ $data->hasil }}" required>
                                                    </div>
                                                    <div class="col-3 m-auto">
                                                        <label for="">{{ $data->get_data->satuan }}</label>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <hr style="size:2;">

                            </div>
                            @endif
                        @endforeach
                    </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" id="add{{$id}}" class="btn btn-warning">Add More Sample</button>
                <button type="submit" class="btn btn-primary">Save Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.addEventListener("DOMContentLoaded", (event) => {
        let i = {{$i}};
        $("#add{{$id}}").click(function() {
            ++i;
            $("#main-form{{$id}}").append(
                `<div class="sample">
                    <div class="row mb-4 mx-auto justify-content-center">
                        <h5 class="my-auto">Masukkan Sampel ke-` + i + `</h5>
                        <a class="iq-icons-list text-danger remove mt-2 ml-2"
                            href="#" type="button"
                            title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" class="m-0">
                                <path fill-rule="evenodd"
                                    d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>BIOTA LAUT</h6>
                            <hr>
                            @foreach ($sampelUji as $data)
                                @if ($data->param->jenis == 'biota' && $outer->uji_ke == $data->uji_ke && $data->id_uji == $id)
                                    <input type="hidden" name="id[` + i + `][]" value="{{ $data->id }}">
                                    <div class="form-row my-3">
                                        <div class="col-5 m-auto">
                                            <label for="validationTooltip05">{{ $data->param->parameter }}</label>
                                        </div>
                                        <input type="hidden" name="id_parameter[` + i + `][]"
                                            value="{{ $data->id_parameter }}">
                                        <div class="col-4">
                                            <input type="number" step="0.01" min="0" class="form-control"
                                                id="validationTooltip05" name="hasil[` + i + `][]" value="{{ $data->hasil }}"
                                                required>
                                        </div>
                                        <div class="col-3 m-auto">
                                            <label for="">{{ $data->get_data->satuan }}</label>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-sm-6">
                            <h6>WISATA BAHARI</h6>
                            <hr>
                            @foreach ($sampelUji as $data)
                                @if ($data->param->jenis == 'wisata' && $outer->uji_ke == $data->uji_ke && $data->id_uji == $id)
                                    <input type="hidden" name="id[` + i + `][]" value="{{ $data->id }}">
                                    <div class="form-row my-3">
                                        <div class="col-5 m-auto">
                                            <label for="validationTooltip05">{{ $data->param->parameter }}</label>
                                        </div>
                                        <input type="hidden" name="id_parameter[` + i + `][]"
                                            value="{{ $data->id_parameter }}">
                                        <div class="col-4">
                                            <input type="number" step="0.01" min="0"
                                                class="form-control" id="validationTooltip05" name="hasil[` + i + `][]"
                                                value="{{ $data->hasil }}" required>
                                        </div>
                                        <div class="col-3 m-auto">
                                            <label for="">{{ $data->get_data->satuan }}</label>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                `
            );
        });
        $(document).on('click', '.remove', function() {
            $(this).parent().parent('div.sample').remove();
        });
    });
</script>
