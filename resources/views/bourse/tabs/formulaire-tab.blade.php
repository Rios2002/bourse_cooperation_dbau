<div role="tabpanel" class="tab-pane fade " id="tabFormulaire" aria-labelledby="tabFormulaire">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="text-end">
                        <a href="{{ route('bourses.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                    </div>

                </div>


                <div class="col-12">
                    <div class="col-12">
                        <h5>Formulaires associé à la bourse </h5>
                        <div class="text-end">

                            <button class="btn btn-sm btn-outline-secondary rounded-05 mb-3" type="button"
                                data-bs-toggle="collapse" data-bs-target="#dipll" aria-expanded="false"
                                aria-controls="collapseExample">
                                <i class="fa fa-plus me-2"></i>
                                Ajouter un Formulaire
                            </button>
                        </div>
                        <div class="alert alert-info collapse" id="dipll">
                            <form action="{{ route('bourses.storeFormulaire', $bourse->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Formulaire</label>
                                            {{ html()->select('formulaire_id')->options($formulaires)->placeholder('-- Selectionner --')->class('form-select select2 rounded-05')->required()->value(old('formulaire_id')) }}
                                            {!! $errors->first(
                                                'formulaire_id',
                                                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                                            ) !!}

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit"
                                            class="btn btn-success rounded-05 mt-2">Enregistrer</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatable w-100 ">
                                <thead>
                                    <th>N°</th>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($bourseFormulaires as $bf)
                                        <tr>
                                            <td> {{ $loop->iteration }} </td>
                                            <td>{{ $bf->Titre }}</td>
                                            <td>
                                                {{ $bf->Description }}
                                            </td>
                                            <td>
                                                <form action="{{ route('bourses.deleteFormulaire', $bourse->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <input type="hidden" name="formulaire_id"
                                                        value="{{ $bf->id }}">
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash me-2"></i>
                                                        Supprimer
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
