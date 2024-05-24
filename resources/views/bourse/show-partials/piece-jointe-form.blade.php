<div class="col-12">

    <h5> Pièce Jointe de la bourse {{ $bourse->LibelleBourse }}: </h5>
    <small>
        <i class="fa fa-info-circle me-2"></i>
        Gérer dans cette section les Pièce Jointe de base de la bourse par diplôme de base
    </small>
</div>
<div class="col-lg-12">
    <div class="text-end">
        <button class="btn btn-sm btn-outline-secondary rounded-05 mb-3" type="button" data-bs-toggle="collapse"
            data-bs-target="#pjcol" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa fa-plus me-2"></i>
            Ajouter une pièce jointe
        </button>
    </div>
    <div class="alert alert-info collapse" id="pjcol">
        <form action="{{ route('bourses.addPj', $bourse->id) }}" method="post">
            @csrf
            <div class="row  align-items-center ">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="piece_jointe" class="form-label">Pièce jointe</label>

                        <select name="piece_jointe" id="piece_jointe" style="z-index: 999999999 !important;"
                            class="form-select select2 @if ($errors->has('piece_jointe')) is-invalid @endif rounded-05">
                            <option value="">-- Selectionner --</option>
                            @foreach ($pieceJointes as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="CodeDiplome" class="form-label">Diplome de base</label>

                        <select name="CodeDiplome" id="CodeDiplome"
                            class="form-select select2 @if ($errors->has('CodeDiplome')) is-invalid @endif rounded-05">
                            <option value="">-- Selectionner --</option>
                            @foreach ($diplomes as $key => $value)
                                @if (!in_array($key, $bourseDiplomes))
                                    @continue
                                @endif
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-2  align-items-center ">
                    <button type="submit" class="btn btn-success rounded-05">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table w-10 table-striped ">
            <thead>
                <th>N°</th>
                <th>Libellé</th>
                <th>Descriptif</th>
                <th>Diplome de base</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($boursePJ as $pj)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pj->pieceJointe()->first()->Libelle }}</td>
                        <td>{{ $pj->pieceJointe()->first()->Description }}</td>
                        <td>{{ $pj->CodeDiplome }} </td>
                        <th>
                            <form action="{{ route('bourses.deletePj', $bourse->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="piece_jointe" value="{{ $pj->piece_jointe_id }}">
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-05"><i class="fa fa-trash">
                                    </i> Supprimer
                                </button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
