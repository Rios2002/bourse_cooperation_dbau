<div class="col-12">
    <h5> Filière de la bourse : {{ $bourse->LibelleBourse }} </h5>
</div>
<div class="col-lg-12">
    <div class="text-end">
        <button class="btn btn-sm btn-outline-secondary rounded-05 mb-3" type="button" data-bs-toggle="collapse"
            data-bs-target="#filcol" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa fa-plus me-2"></i>
            Ajouter une filière
        </button>
    </div>
    <div class="alert alert-info collapse" id="filcol">
        <form action="{{ route('bourses.storeFiliere', $bourse->id) }}" method="post">
            @csrf
            <div class="row  align-items-center ">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="filiere" class="form-label">Filière</label>
                        @php
                            $bourseFiliereArray = $bourseFiliers->pluck('filiere_id')->toArray();
                        @endphp
                        <select name="filiere" id="filiere"
                            class="form-select select2 @if ($errors->has('filiere')) is-invalid @endif rounded-05">
                            <option value="">-- Selectionner --</option>
                            @foreach ($filiers as $key => $value)
                                @if (in_array($key, $bourseFiliereArray))
                                    @continue
                                @endif
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="CodeCycle" class="form-label">Cycle</label>

                        <select name="CodeCycle" id="CodeCycle"
                            class="form-select select2 @if ($errors->has('CodeCycle')) is-invalid @endif rounded-05">
                            <option value="">-- Selectionner --</option>
                            @foreach ($cycles as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label for="Quota" class="form-label">Quota</label>
                    <input type="number" name="quota" id="Quota"
                        class="form-control @if ($errors->has('quota')) is-invalid @endif rounded-05"
                        value="{{ old('quota') }}">
                    {{ $errors->first('quota') }}

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
                <th>Cycle</th>
                <th>Quota</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($bourseFiliers as $fil)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td title="{{ $fil->LibelleFiliere }}">
                            {{ Str::limit($fil->filiere()->first()->LibelleFiliere, 50) }}</td>
                        <td>{{ $fil->CodeCycle }} </td>
                        <td>{{ $fil->quota }}</td>
                        <th>
                            <form action="{{ route('bourses.deleteFiliere', $bourse->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="filiere" value="{{ $fil->id }}">
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
