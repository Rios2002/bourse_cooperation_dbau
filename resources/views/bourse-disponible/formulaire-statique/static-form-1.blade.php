<form action="{{ route('bourses-postuler-push', [$bourse->id, $demande->id, $keyStep]) }}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="n_p_i" class="form-label">{{ __('NPI') }}</label>
            </strong> ( Numéro Personnel d'Identification ) <strong class="text-danger"> * </strong>
            <input type="text" name="NPI" class="form-control @error('NPI') is-invalid @enderror rounded-05"
                value="{{ old('NPI', $demande?->NPI) }}" id="n_p_i" required minlength="8" maxlength="15">
            {!! $errors->first('NPI', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="nom" class="form-label">{{ __('Nom') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="text" name="Nom" class="form-control @error('Nom') is-invalid @enderror rounded-05"
                value="{{ old('Nom', $demande?->Nom) }}" id="nom" required maxlength="255">
            {!! $errors->first('Nom', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="prenom" class="form-label">{{ __('Prenom') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="text" name="Prenom" class="form-control @error('Prenom') is-invalid @enderror rounded-05"
                value="{{ old('Prenom', $demande?->Prenom) }}" id="prenom" required maxlength="255">
            {!! $errors->first('Prenom', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="date_naissance" class="form-label">{{ __('Date de Naissance') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="date" name="DateNaissance"
                class="form-control @error('DateNaissance') is-invalid @enderror rounded-05"
                value="{{ old('DateNaissance', $demande?->DateNaissance?->format('Y-m-d')) }}" id="date_naissance"
                required autocomplete="birthdate">
            {!! $errors->first(
                'DateNaissance',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="lieu_naissance" class="form-label">{{ __('Lieu de naissance') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="text" name="LieuNaissance"
                class="form-control @error('LieuNaissance') is-invalid @enderror rounded-05"
                value="{{ old('LieuNaissance', $demande?->LieuNaissance) }}" id="lieu_naissance" required
                maxlength="255">
            {!! $errors->first(
                'LieuNaissance',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="sexe" class="form-label">{{ __('Sexe') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <div class="d-flex text-dark">
                <div class="form-check me-2">
                    <input class="form-check-input" type="radio" name="Sexe" id="masculin" value="M"
                        {{ old('Sexe', $demande?->Sexe) == 'M' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="masculin">
                        Masculin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Sexe" id="feminin" value="F"
                        {{ old('Sexe', $demande?->Sexe) == 'F' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="feminin">
                        Féminin
                    </label>
                </div>
            </div>
            {{-- <input type="text" name="Sexe" class="form-control @error('Sexe') is-invalid @enderror rounded-05"
            value="{{ old('Sexe', $demande?->Sexe) }}" id="sexe"> --}}
            {!! $errors->first('Sexe', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-8 form-group mb-2 mb20">
            <strong> <label for="code_diplome" class="form-label">{{ __('Diplome de base') }}</label>
                <strong class="text-danger"> * </strong> </strong>

            <select name="CodeDiplome" id="CodeDiplome"
                class="form-select select2 @if ($errors->has('CodeDiplome')) is-invalid @endif rounded-05" required>
                <option value="">-- Selectionner --</option>
                @foreach ($diplomes as $diplome)
                    <option value="{{ $diplome->CodeDiplome }}" @if (old('CodeDiplome', $demande?->CodeDiplome) == $diplome->CodeDiplome) selected @endif>
                        {{ $diplome->LibelleDiplome }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('CodeDiplome', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        @if (!$demande->Imprime)
            <div class="col-lg-12">
                <div class=" mt-3">
                    <button type="submit" class="btn btn-primary rounded-1 ">
                        <i class="fa fa-save me-2"></i>
                        Enregistrer</button>
                </div>
            </div>
        @endif

    </div>
</form>
