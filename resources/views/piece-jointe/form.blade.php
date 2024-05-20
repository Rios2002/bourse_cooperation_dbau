<div class="">
    <div class="row">

        <div class="form-group mb-2 mb20">
            <strong> <label for="libelle" class="form-label">{{ __('Libelle') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="Libelle" class="form-control @error('Libelle') is-invalid @enderror rounded-05"
                value="{{ old('Libelle', $pieceJointe?->Libelle) }}" id="libelle">
            {!! $errors->first('Libelle', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <strong> <label for="description" class="form-label">{{ __('Description') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="Description"
                class="form-control @error('Description') is-invalid @enderror rounded-05"
                value="{{ old('Description', $pieceJointe?->Description) }}" id="description">
            {!! $errors->first('Description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <strong> <label for="taille_max" class="form-label">{{ __('Taille Maximum') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong> (en Octet Ex: 1 Mo = 1024 Octets)
            <input type="number" name="TailleMax" max="10240" min="512"
                class="form-control @error('TailleMax') is-invalid @enderror rounded-05"
                value="{{ old('TailleMax', $pieceJointe?->TailleMax ?? 1024) }}" id="taille_max">
            {!! $errors->first('TailleMax', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <strong> <label for="type_fichier" class="form-label">{{ __('Typefichier') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            {{-- <input type="text" name="TypeFichier"
                class="form-control @error('TypeFichier') is-invalid @enderror rounded-05"
                value="{{ old('TypeFichier', $pieceJointe?->TypeFichier) }}" id="type_fichier"> --}}
            <select name="TypeFichier"
                class="form-control @error('TypeFichier') is-invalid @enderror rounded-05 select2" id="type_fichier">
                <option value="">-- Sélectionner -- </option>
                <option value="PDF" {{ old('TypeFichier', $pieceJointe?->TypeFichier) == 'PDF' ? 'selected' : '' }}>
                    PDF</option>
                <option value="Image"
                    {{ old('TypeFichier', $pieceJointe?->TypeFichier) == 'Image' ? 'selected' : '' }}>Image</option>
            </select>
            {!! $errors->first('TypeFichier', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
