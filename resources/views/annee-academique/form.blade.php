<div class="">
    <div class="row">

        {{-- <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="code_annee_academique" class="form-label">{{ __('Codeanneeacademique') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="CodeAnneeAcademique" class="form-control @error('CodeAnneeAcademique') is-invalid @enderror rounded-05" value="{{ old('CodeAnneeAcademique', $anneeAcademique?->CodeAnneeAcademique) }}" id="code_annee_academique" >
            {!! $errors->first('CodeAnneeAcademique', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="libelle_annee_academique" class="form-label">{{ __('Libelleanneeacademique') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="LibelleAnneeAcademique" class="form-control @error('LibelleAnneeAcademique') is-invalid @enderror rounded-05" value="{{ old('LibelleAnneeAcademique', $anneeAcademique?->LibelleAnneeAcademique) }}" id="libelle_annee_academique" >
            {!! $errors->first('LibelleAnneeAcademique', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}
        <div class="col-lg-12 form-group mb-2 mb20">
            <strong> <label for="annee_debut" class="form-label">{{ __('Annee Début') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>

            <input type="text" name="AnneeDebut" pattern="[0-9]{4}" min="1900" max="9999"
                class="form-control @error('AnneeDebut') is-invalid @enderror rounded-05"
                value="{{ old('AnneeDebut', $anneeAcademique?->AnneeDebut) }}" id="annee_debut">
            <i class="fa fa-info-circle me-2 mt-2"></i> L'année à la borne inférieur de l'année académique. Ex : Pour
            2020-2021, l'année de début est 2020.
            {!! $errors->first('AnneeDebut', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
