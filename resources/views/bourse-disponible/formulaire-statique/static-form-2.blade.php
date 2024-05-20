<form action="{{ route('bourses-postuler-push', [$bourse->id, $demande->id, $keyStep]) }}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="serie_ou_filiere_base" class="form-label">
                    Série au BAC (pour les bacheliers) ou Filière du dipôme de base
                </label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="text" name="SerieOuFiliereBase"
                class="form-control @error('SerieOuFiliereBase') is-invalid @enderror rounded-05"
                value="{{ old('SerieOuFiliereBase', $demande?->SerieOuFiliereBase) }}" id="serie_ou_filiere_base"
                required maxlength="255">
            {!! $errors->first(
                'SerieOuFiliereBase',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="annee_obtention" class="form-label">
                    Année d'obtention du diplôme de base <strong class="text-danger"> * </strong>
                </label>
                @php
                    $annee = date('Y');
                    $anneeArray = [];
                    for ($i = 0; $i < 50; $i++) {
                        $anneeArray[] = $annee - $i;
                    }
                @endphp

                <select name="AnneeObtention"
                    class="form-control select2 @error('AnneeObtention') is-invalid @enderror rounded-05"
                    id="annee_obtention" required>
                    <option value="">-- Sélectionner --</option>
                    @foreach ($anneeArray as $annee)
                        <option value="{{ $annee }}"
                            {{ old('AnneeObtention', $demande?->AnneeObtention) == $annee ? 'selected' : '' }}>
                            {{ $annee }}</option>
                    @endforeach
                </select>
            </strong>


            {!! $errors->first(
                'AnneeObtention',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="moyenne" class="form-label">{{ __('Moyenne du diplôme de base') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="number" step=".01" min="0" max="20" name="Moyenne"
                class="form-control @error('Moyenne') is-invalid @enderror rounded-05"
                value="{{ old('Moyenne', $demande?->Moyenne) }}" id="moyenne">
            {!! $errors->first('Moyenne', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="mention" class="form-label">{{ __('Mention du diplôme de base') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            @php
                $mentions = ['PASSABLE', 'ASSEZ BIEN', 'BIEN', 'TRES BIEN', 'EXCELLENT', 'NON MENTIONNÉE'];
            @endphp
            <select name="Mention" class="form-control select2 @error('Mention') is-invalid @enderror rounded-05"
                id="mention" required>
                <option value="">-- Sélectionner --</option>
                @foreach ($mentions as $mention)
                    <option value="{{ $mention }}"
                        {{ old('Mention', $demande?->Mention) == $mention ? 'selected' : '' }}>
                        {{ $mention }}</option>
                @endforeach
            </select>
            {!! $errors->first('Mention', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}



        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="cycle_sollicite" class="form-label">{{ __('Cycle Sollicite') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>

            <select name="CycleSollicite" class="form-control  @error('CycleSollicite') is-invalid @enderror rounded-05"
                id="cycle_sollicite" required disabled>
                <option value="">-- Sélectionner --</option>
                @foreach ($cycles as $cycle)
                    <option value="{{ $cycle->CodeCycle }}"
                        {{ old('CycleSollicite', $demande?->CycleSollicite) == $cycle->CodeCycle ? 'selected' : '' }}>
                        {{ $cycle->LibelleCycle }}</option>
                @endforeach
            </select>
            {!! $errors->first(
                'CycleSollicite',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}



            {!! $errors->first(
                'CycleSollicite',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
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
