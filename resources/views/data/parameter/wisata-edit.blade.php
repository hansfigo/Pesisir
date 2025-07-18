<div id="edit{{ $id }}" class="modal fade bd-example" tabindex="-1" role="dialog" aria-labelledby="createTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTitle">Edit Data Parameter Wisata Bahari</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('edit-datawisata', base64_encode($id)) }}"
                    class="needs-validation" novalidate>
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col-4 m-auto">
                            <label for="validationTooltip05">Golongan</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="validationTooltip05"
                                value="{{ $parameter->get_data->gol_parameter->nama }}" disabled>
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-4 m-auto">
                            <label for="validationTooltip05">Parameter</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="validationTooltip05"
                                value="{{ $name_param }}" disabled>
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-4 m-auto">
                            <label for="validationTooltip05">Satuan</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="validationTooltip05" name="satuan"
                                value="{{ $parameter->satuan }}">
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-4 m-auto">
                            <label for="validationTooltip05">Baku Mutu</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="validationTooltip05" name="baku_mutu"
                                value="{{ $parameter->baku_mutu }}">
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-4 m-auto">
                            <label for="validationTooltip05">Nilai Standar Value</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="validationTooltip05" name="nilai"
                                value="{{ $parameter->nilai }}">
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                        {{-- Input Hidden --}}
                        <input type="hidden" class="form-control" id="validationTooltip05" name="id_parameter"
                            value="{{ $parameter->id_parameter }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
