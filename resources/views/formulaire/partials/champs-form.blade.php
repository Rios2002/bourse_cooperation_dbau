<div class="col-12">
    <h5>
        Les Champs du formulaire
    </h5>
    <div class="text-end">
        <button class="btn btn-sm btn-outline-secondary rounded-05 mb-3" type="button" data-bs-toggle="collapse"
            data-bs-target="#formColl" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa fa-plus me-2"></i>
            Ajouter un Champs au formulaire
        </button>
    </div>
    <div class="alert alert-info collapse" id="formColl">
        <form action="{{ route('champ-formulaires.store') }}" method="post">
            @csrf
            <div class="row">
                <form method="POST" action="{{ route('champ-formulaires.store') }}" role="form"
                    enctype="multipart/form-data">
                    @csrf

                    @include('champ-formulaire.form')

                </form>

            </div>
        </form>
    </div>
    @include('champ-formulaire.index')

</div>
