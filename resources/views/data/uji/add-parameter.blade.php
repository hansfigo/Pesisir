<div id="pilih_parameter{{ $id }}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="createTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTitle">Pilih Parameter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('add-ujiparam') }}" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="id_uji" value="{{ $id }}">
                    <div class="form-row my-3">
                        <div class="col-2 m-auto">
                            <label for="validationTooltip05">Pilih Parameter Biota Laut</label>
                        </div>
                        <div class="col-10">
                            <select multiple class="form-control choicesjs" id="sel1" name="id_parameter[]">
                                @foreach ($parameter as $value)
                                    @if ($value->jenis == 'biota')
                                        <option value="{{ $value->id }}">
                                            {{ $value->parameter }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row my-3">
                        <div class="col-2 m-auto">
                            <label for="validationTooltip05">Pilih Parameter Wisata Bahari</label>
                        </div>
                        <div class="col-10">
                            <select multiple class="form-control choicesjs" id="sel2" name="id_parameter[]">
                                @foreach ($parameter as $value)
                                    @if ($value->jenis == 'wisata')
                                        <option value="{{ $value->id }}">
                                            {{ $value->parameter }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
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
