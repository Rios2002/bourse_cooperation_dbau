<div class="">
    <div class="row">

        <div class="form-group mb-2 mb20">
            <strong> <label for="code_diplome" class="form-label">{{ __('Code Diplome') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="CodeDiplome"
                class="form-control @error('CodeDiplome') is-invalid @enderror rounded-05"
                value="{{ old('CodeDiplome', $diplomeDeBase?->CodeDiplome) }}" id="code_diplome">
            {!! $errors->first('CodeDiplome', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <strong> <label for="libelle_diplome" class="form-label">{{ __('Libelle Diplome') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="LibelleDiplome"
                class="form-control @error('LibelleDiplome') is-invalid @enderror rounded-05"
                value="{{ old('LibelleDiplome', $diplomeDeBase?->LibelleDiplome) }}" id="libelle_diplome">
            {!! $errors->first(
                'LibelleDiplome',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <strong> <label for="cycle_cible" class="form-label">{{ __('Cyclecible') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>

            <select name="CycleCible" id=""
                class="form-select select2 form-control  @error('CycleCible') is-invalid @enderror">
                <option value="">-- Sélectionner --</option>
                @foreach ($cycles as $cycle)
                    <option value="{{ $cycle->CodeCycle }}" @if ($cycle->CodeCycle == old('CycleCible', $diplomeDeBase?->CycleCible)) selected @endif>
                        {{ $cycle->LibelleCycle }}</option>
                @endforeach
            </select>
            {!! $errors->first('CycleCible', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
