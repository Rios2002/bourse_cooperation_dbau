<div class="">
    <div class="row">

        <div class="col-lg-12 form-group mb-2 mb20">
            <strong> <label for="libelle_bourse" class="form-label">{{ __('Libelle Bourse') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="LibelleBourse"
                class="form-control @error('LibelleBourse') is-invalid @enderror rounded-05"
                value="{{ old('LibelleBourse', $bourse?->LibelleBourse) }}" id="libelle_bourse" maxlength="255">
            {!! $errors->first(
                'LibelleBourse',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-12 form-group mb-2 mb20">
            <strong> <label for="description" class="form-label">{{ __('Description') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="Description"
                class="form-control @error('Description') is-invalid @enderror rounded-05"
                value="{{ old('Description', $bourse?->Description) }}" id="description" maxlength="255">
            {!! $errors->first('Description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 mb-2 mb20">
            <strong> <label for="code_pays" class="form-label">{{ __('Pays') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            {{-- <input type="text" name="CodePays" class="form-control @error('CodePays') is-invalid @enderror rounded-05" value="{{ old('CodePays', $bourse?->CodePays) }}" id="code_pays" > --}}

            <select name="CodePays" id=""
                class="form-select select2 form-control  @error('CodePays') is-invalid @enderror">
                <option value="">-- Sélectionner --</option>
                @foreach ($pays as $CodePays => $LibellePays)
                    <option value="{{ $CodePays }}" @if ($CodePays == old('CodePays', $bourse?->CodePays)) selected @endif>
                        {{ $LibellePays }}</option>
                @endforeach
            </select>
            {!! $errors->first('CodePays', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 mb-2 mb20">
            <strong> <label for="CodeAnneeAcademique" class="form-label">{{ __('Année Academique') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            {{-- <input type="text" name="CodePays" class="form-control @error('CodePays') is-invalid @enderror rounded-05" value="{{ old('CodePays', $bourse?->CodePays) }}" id="code_pays" > --}}

            <select name="CodeAnneeAcademique" id=""
                class="form-select select2 form-control  @error('CodeAnneeAcademique') is-invalid @enderror">
                <option value="">-- Sélectionner --</option>
                @foreach ($anneeAcademiques as $CodePays => $LibellePays)
                    <option value="{{ $CodePays }}" @if ($CodePays == old('CodePays', $bourse?->CodeAnneeAcademique)) selected @endif>
                        {{ $LibellePays }}</option>
                @endforeach
            </select>
            {!! $errors->first('CodePays', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <div class="col-lg-12 form-group mb-2 mb20">
            <strong> <label for="communique" class="form-label">{{ __('Communique') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            @if ($bourse && $bourse->Communique)
                <div class="d-flex align-items-center mb-2">
                    <a href="{{ asset($bourse->Communique) }}" target="_blank" class="btn btn-primary rounded-1">Voir
                        le fichier</a>

                </div>
            @endif
            <input type="file" name="Communique" accept=".pdf"
                class="form-control @error('Communique') is-invalid @enderror rounded-05"
                value="{{ old('Communique', $bourse?->Communique) }}" id="communique">
            {!! $errors->first('Communique', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="date_ouverture" class="form-label">{{ __('Dateouverture') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="datetime-local" name="DateOuverture"
                class="form-control @error('DateOuverture') is-invalid @enderror rounded-05"
                value="{{ old('DateOuverture', $bourse?->DateOuverture) }}" id="date_ouverture">
            {!! $errors->first(
                'DateOuverture',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="date_fermeture" class="form-label">{{ __('Datefermeture') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="datetime-local" name="DateFermeture"
                class="form-control @error('DateFermeture') is-invalid @enderror rounded-05"
                value="{{ old('DateFermeture', $bourse?->DateFermeture) }}" id="date_fermeture">
            {!! $errors->first(
                'DateFermeture',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="quota" class="form-label">{{ __('Quota') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="number" step="." name="Quota"
                class="form-control @error('Quota') is-invalid @enderror rounded-05"
                value="{{ old('Quota', $bourse?->Quota) }}" id="quota">
            {!! $errors->first('Quota', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-12 form-group mb-2 mb20">

            <div class="form-check">
                <input type="checkbox" name="isDisponible"
                    class="form-check-input @error('isDisponible') is-invalid @enderror rounded-05" value="1"
                    id="is_disponible" @if (old('isDisponible', $bourse?->isDisponible ?? true)) checked @endif>
                <strong> <label for="is_disponible" class="form-label">{{ __('Est Disponible') }}</label>
                    <!-- <strong class="text-danger"> * </strong> --> </strong>
            </div>

            {!! $errors->first('isDisponible', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
