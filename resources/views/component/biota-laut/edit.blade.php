<div id="edit{{ $id }}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="createTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTitle">Edit Parameter Biota Laut</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('edit-biota', base64_encode($id)) }}" class="needs-validation"
                    novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="col-3 m-auto">
                            <label for="sel1">Kriteria</label>
                        </div>
                        <div class="col-9 mb-0">
                            <select name="id_gol" class="form-control choicesjs mb-0" required>
                                @foreach ($golongan as $value)
                                    @if ($parameter->id_gol == $value->id)
                                        <option value="{{ $value->id }}" selected>{{ $value->nama }}</option>
                                    @else
                                        <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-tooltip">
                                Please select One!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Nama Parameter</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="validationTooltip05" name="parameter"
                                value="{{ $parameter->parameter }}" required>
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Nama Lain</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="validationTooltip05" name="nama_lain"
                                value="{{ $parameter->nama_lain }}" required>
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
