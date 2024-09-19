<div class="">
    <div class="row">
        {{ html()->hidden('formulaire_id', $formulaire->id) }}


        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="code_type_champ" class="form-label">{{ __('Type du Champ') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            {{ html()->select('CodeTypeChamp', $typesTC, old('CodeTypeChamp', $champFormulaire?->CodeTypeChamp))->class('form-control form-select ' . ($errors->has('CodeTypeChamp') ? 'is-invalid' : ''))->required()->placeholder('-- Sélectionner --')->id('CodeTypeChampSel') }}
            {{-- <input type="text" name="CodeTypeChamp"
                class="form-control @error('CodeTypeChamp') is-invalid @enderror rounded-05"
                value="{{ old('CodeTypeChamp', $champFormulaire?->CodeTypeChamp) }}" id="code_type_champ"> --}}
            {!! $errors->first(
                'CodeTypeChamp',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="is_required" class="form-label">{{ __('Ce Champs est obligoire ?') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            {{ html()->select('isRequired', ['1' => 'Oui', '0' => 'Non'], old('isRequired', $champFormulaire?->isRequired))->class('form-control form-select ' . ($errors->has('isRequired') ? 'is-invalid' : ''))->required()->placeholder('-- Selectionner --') }}
            {!! $errors->first('isRequired', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-12 form-group mb-2 mb20">
            <strong> <label for="libelle_champ" class="form-label">{{ __('Libellé du champs / Question') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="text" name="LibelleChamp"
                class="form-control @error('LibelleChamp') is-invalid @enderror rounded-05"
                value="{{ old('LibelleChamp', $champFormulaire?->LibelleChamp) }}" id="libelle_champ" required>
            {!! $errors->first('LibelleChamp', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-8 form-group mb-2 mb20">
            <strong> <label for="description_champ" class="form-label">{{ __('Description du Champs ') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong> (Cette description sera affiché à coté du
            champ)
            <input type="text" name="DescriptionChamp"
                class="form-control @error('DescriptionChamp') is-invalid @enderror rounded-05"
                value="{{ old('DescriptionChamp', $champFormulaire?->DescriptionChamp) }}" id="description_champ"
                required>
            {!! $errors->first(
                'DescriptionChamp',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="class_c_s_s" class="form-label">{{ __('Classe CSS') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong> (facultatif)
            <input type="text" name="classCSS"
                class="form-control @error('classCSS') is-invalid @enderror rounded-05"
                value="{{ old('classCSS', $champFormulaire?->classCSS) }}" id="class_c_s_s">
            {!! $errors->first('classCSS', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-12">
            <hr>
        </div>
        @foreach ($attributs as $attr)
            <div class="col-lg-6 form-group mb-2 mb20 dynamic" parent="{{ $attr->CodeTypeChamp }}"
                style="display: none;">
                <span>
                    <strong>
                        {{ html()->label($attr->SpatieFunction)->class('form-label text-uppercase') }}
                    </strong> <br>
                    {{ $attr->Description }}
                </span>
                {{ html()->input('number')->class('form-control rounded-05')->value(old('attribut_' . $attr->id, $attr->getDefaultValue()))->name('attribut_' . $attr->id) }}
            </div>
        @endforeach
    </div>
    <div class="col-lg-12">
        <button type="submit" class="btn btn-success rounded-05 mt-2">Enregistrer</button>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        $('#CodeTypeChampSel').on('change', function() {
            var parent = $(this).val();
            $('.dynamic').each(function() {
                if ($(this).attr('parent') == parent) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
