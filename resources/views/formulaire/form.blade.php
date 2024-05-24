<div class="">
    <div class="row">

        <div class="col-lg-12 form-group mb-2 mb20">
            <strong> <label for="code_type_formulaire" class="form-label">{{ __('Type formulaire') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>


            {{ html()->select('CodeTypeFormulaire', $types, old('CodeTypeFormulaire', $formulaire?->CodeTypeFormulaire))->placeholder('-- Selectionner --')->class('form-control rounded-05 ' . ($errors->has('CodeTypeFormulaire') ? 'is-invalid' : '') . ' form-select')->required() }}

            {!! $errors->first(
                'CodeTypeFormulaire',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="titre" class="form-label">{{ __('Titre') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            {{ html()->text('Titre')->value(old('Titre', $formulaire?->Titre))->class('form-control rounded-05 ' . ($errors->has('Titre') ? 'is-invalid' : '') . '')->required() }}

            {!! $errors->first('Titre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="description" class="form-label">{{ __('Description') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="Description"
                class="form-control @error('Description') is-invalid @enderror rounded-05"
                value="{{ old('Description', $formulaire?->Description) }}" id="description">
            {!! $errors->first('Description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
