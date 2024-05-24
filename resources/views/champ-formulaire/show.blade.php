<div class="form-group text-dark">
    <strong class="">
        {{ $champFormulaire->buildLabel() }}

    </strong>
    @if ($champFormulaire->isRequired)
        <span class="text-danger"> * </span>
    @endif
    @if (
        $champFormulaire->DescriptionChamp &&
            $champFormulaire->DescriptionChamp != '' &&
            $champFormulaire->DescriptionChamp != '-')
        <p>
            <i class="fa fa-info-circle me-2"></i>
            {{ $champFormulaire->DescriptionChamp }}
        </p>
    @else
        <p></p>
    @endif
    @if (isset($demande))
        {{ $champFormulaire->buildHTML()->value($champFormulaire->getRemplissageChamp($demande->id)) }}
    @else
        {{ $champFormulaire->buildHTML() }}
    @endif

</div>
