<form action="{{ route('bourses-postuler-push', [$bourse->id, $demande->id, $keyStep]) }}" method="post">
    @csrf
    <div class="row">

        @if ($demande->doitSaisirFiliere())
            <div class="col-lg-12 form-group mb-2 mb20">
                <strong> <label for="libelle_filiere" class="form-label">{{ __('Saisir la filière') }}</label>
                    <strong class="text-danger"> * </strong> </strong>
                <input type="text" name="LibelleFiliere"
                    class="form-control @error('LibelleFiliere') is-invalid @enderror rounded-05"
                    value="{{ old('LibelleFiliere', $demande?->LibelleFiliere) }}" id="libelle_filiere" max="255"
                    required>
                {!! $errors->first(
                    'LibelleFiliere',
                    '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                ) !!}
            </div>
        @else
            <div class="col-lg-12 form-group mb-2 mb20">
                <strong> <label for="filiere_id" class="form-label">{{ __('Filiere Sollicitée') }}</label>
                    <strong class="text-danger"> * </strong> </strong>

                <select name="filiere_id"
                    class="form-control select2 @error('filiere_id') is-invalid @enderror rounded-05" id="filiere_id">
                    <option value="">-- Sélectionner --</option>
                    @foreach ($demande->filieresPossible() ?? [] as $filiere)
                        <option value="{{ $filiere->id }}"
                            {{ old('filiere_id', $demande?->filiere_id) == $filiere->id ? 'selected' : '' }}>
                            {{ $filiere->LibelleFiliere }}
                        </option>
                    @endforeach
                </select>
                {{-- <input type="text" name="filiere_id"
                class="form-control @error('filiere_id') is-invalid @enderror rounded-05"
                value="{{ old('filiere_id', $demande?->filiere_id) }}" id="filiere_id"> --}}
                {!! $errors->first('filiere_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        @endif


        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="statut_allocataire" class="form-label">{{ __('Statut Allocataire') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            {{-- <input type="text" name="StatutAllocataire"
            class="form-control @error('StatutAllocataire') is-invalid @enderror rounded-05"
            value="{{ old('StatutAllocataire', $demande?->StatutAllocataire) }}" id="statut_allocataire">
             --}}

            <select name="StatutAllocataire"
                class="form-control form-select @error('StatutAllocataire') is-invalid @enderror rounded-05"
                id="statut_allocataire">
                <option value="">-- Sélectionner --</option>
                <option value="OUI"
                    {{ old('StatutAllocataire', $demande?->StatutAllocataire) == 'OUI' ? 'selected' : '' }}>Oui, je suis
                    déjà boursier</option>
                <option value="NON"
                    {{ old('StatutAllocataire', $demande?->StatutAllocataire) == 'NON' ? 'selected' : '' }}>Non, je ne
                    suis
                    pas boursier</option>
            </select>
            {!! $errors->first(
                'StatutAllocataire',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="contact" class="form-label">{{ __('Contact Whatsapp') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="text" name="Contact" class="form-control @error('Contact') is-invalid @enderror rounded-05"
                value="{{ old('Contact', $demande?->Contact) }}" id="contact">
            {!! $errors->first('Contact', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="contact_parent" class="form-label">{{ __('Contact Parent') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="text" name="ContactParent"
                class="form-control @error('ContactParent') is-invalid @enderror rounded-05"
                value="{{ old('ContactParent', $demande?->ContactParent) }}" id="contact_parent">
            {!! $errors->first(
                'ContactParent',
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
