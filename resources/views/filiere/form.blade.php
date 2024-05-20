<div class="">
    <div class="row">
        
        <div class="form-group mb-2 mb20">
            <strong> <label for="libelle_filiere" class="form-label">{{ __('Libellefiliere') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="LibelleFiliere" class="form-control @error('LibelleFiliere') is-invalid @enderror rounded-05" value="{{ old('LibelleFiliere', $filiere?->LibelleFiliere) }}" id="libelle_filiere" >
            {!! $errors->first('LibelleFiliere', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
