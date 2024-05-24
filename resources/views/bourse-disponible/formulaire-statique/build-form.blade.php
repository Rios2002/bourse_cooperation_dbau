<form action="{{ route('bourses-postuler-costum-form', [$bourse->id, $demande->id]) }}" method="post">
    @csrf
    {{ html()->hidden('formulaire_id', $formulaire->id) }}

    <div class="row">
        @foreach ($formulaire->champFormulaires()->get() as $champFormulaire)
            <div class="col-lg-12">
                <div class="mb-2">

                    @include('champ-formulaire.show')
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
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
