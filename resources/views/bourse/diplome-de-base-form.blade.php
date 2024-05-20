<div class="col-lg-12">
    <h5> Diplômes de base de la bourse {{ $bourse->LibelleBourse }} : </h5>
</div>
<div class="col-12">
    <div class="text-end">
        <button class="btn btn-sm btn-outline-secondary rounded-05 mb-3" type="button" data-bs-toggle="collapse"
            data-bs-target="#dipll" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa fa-plus me-2"></i>
            Ajouter un diplôme
        </button>
    </div>
    <div class="alert alert-info collapse" id="dipll">
        <form action="{{ route('bourses.storeDiplomes', $bourse->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="CodeDiplome" class="form-label">Diplome de base</label>

                        <select name="CodeDiplome" id="CodeDiplome"
                            class="form-select select2 @if ($errors->has('CodeDiplome')) is-invalid @endif rounded-05">
                            <option value="">-- Selectionner --</option>
                            @foreach ($diplomes as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="saisirFiliere" class="form-label">Saisir Filière Manuellement</label>
                        <select name="saisirFiliere" id="saisirFiliere"
                            class="form-select select2 @if ($errors->has('saisirFiliere')) is-invalid @endif rounded-05">
                            <option value="0">NON</option>
                            <option value="1">OUI</option>
                        </select>
                    </div>

                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success rounded-05 mt-2">Enregistrer</button>
                </div>

            </div>
        </form>
    </div>
</div>
<div class="col-12">

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Libellé Diplôme</th>
                    <th>Saisir Manuelle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bourse->diplomes as $diplome)
                    <tr>
                        <td>{{ $diplome->LibelleDiplome }}</td>
                        <td>{{ $bourse->doitSaisirFiliere($diplome->CodeDiplome) ? 'OUI' : 'NON' }}</td>
                        <td>
                            <form action="{{ route('bourses.destroyDiplome', [$bourse->id, $diplome->CodeDiplome]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger rounded-05">
                                    <i class="fa fa-trash me-2"></i>
                                    Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
