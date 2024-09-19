<div class="">
    <div class="row">
        
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="code_type_champ" class="form-label">{{ __('Codetypechamp') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="CodeTypeChamp" class="form-control @error('CodeTypeChamp') is-invalid @enderror rounded-05" value="{{ old('CodeTypeChamp', $typeChamp?->CodeTypeChamp) }}" id="code_type_champ" >
            {!! $errors->first('CodeTypeChamp', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="libelle_type_champ" class="form-label">{{ __('Libelletypechamp') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="LibelleTypeChamp" class="form-control @error('LibelleTypeChamp') is-invalid @enderror rounded-05" value="{{ old('LibelleTypeChamp', $typeChamp?->LibelleTypeChamp) }}" id="libelle_type_champ" >
            {!! $errors->first('LibelleTypeChamp', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="spatie_function" class="form-label">{{ __('Spatiefunction') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="SpatieFunction" class="form-control @error('SpatieFunction') is-invalid @enderror rounded-05" value="{{ old('SpatieFunction', $typeChamp?->SpatieFunction) }}" id="spatie_function" >
            {!! $errors->first('SpatieFunction', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="class_c_s_s" class="form-label">{{ __('Classcss') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="ClassCSS" class="form-control @error('ClassCSS') is-invalid @enderror rounded-05" value="{{ old('ClassCSS', $typeChamp?->ClassCSS) }}" id="class_c_s_s" >
            {!! $errors->first('ClassCSS', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="spatie_attributes" class="form-label">{{ __('Spatieattributes') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="SpatieAttributes" class="form-control @error('SpatieAttributes') is-invalid @enderror rounded-05" value="{{ old('SpatieAttributes', $typeChamp?->SpatieAttributes) }}" id="spatie_attributes" >
            {!! $errors->first('SpatieAttributes', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="code_type_sortie" class="form-label">{{ __('Codetypesortie') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="CodeTypeSortie" class="form-control @error('CodeTypeSortie') is-invalid @enderror rounded-05" value="{{ old('CodeTypeSortie', $typeChamp?->CodeTypeSortie) }}" id="code_type_sortie" >
            {!! $errors->first('CodeTypeSortie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
