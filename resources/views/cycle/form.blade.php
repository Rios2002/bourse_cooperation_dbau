<div class="">
    <div class="row">

        <div class="form-group mb-2 mb20">
            <strong> <label for="code_cycle" class="form-label">{{ __('Codecycle') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="CodeCycle" class="form-control @error('CodeCycle') is-invalid @enderror rounded-05"
                value="{{ old('CodeCycle', $cycle?->CodeCycle) }}" id="code_cycle">
            {!! $errors->first('CodeCycle', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <strong> <label for="libelle_cycle" class="form-label">{{ __('Libellecycle') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="LibelleCycle"
                class="form-control @error('LibelleCycle') is-invalid @enderror rounded-05"
                value="{{ old('LibelleCycle', $cycle?->LibelleCycle) }}" id="libelle_cycle">
            {!! $errors->first('LibelleCycle', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        {{-- <div class="form-group mb-2 mb20">
            <strong> <label for="is_writable" class="form-label">{{ __('Iswritable') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="isWritable" class="form-control @error('isWritable') is-invalid @enderror rounded-05" value="{{ old('isWritable', $cycle?->isWritable) }}" id="is_writable" >
            {!! $errors->first('isWritable', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
