<div role="tabpanel" class="tab-pane fade " id="tabDemandes" aria-labelledby="tabDemandes">
    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-lg-12">
                    <div class="text-end mb-3">
                        <a href="{{ route('bourses.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                    </div>

                    @foreach ($demandes as $demande)
                        @include('demande.show-modal')
                    @endforeach
                    <div class="table-responsive">
                        <table class="table table-striped table-hover datatable w-100 ">
                            <thead class="thead">
                                <tr>
                                    <th>N°</th>

                                    <th>Bourse</th>

                                    <th>Code</th>
                                    <th>Npi</th>
                                    <th>Nom et Prénoms</th>
                                    <th>Cycle Sollicité</th>

                                    <th>Observation</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demandes as $demande)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $demande->Bourse()->first()->LibelleBourse }}</td>

                                        <td>
                                            @if ($demande->DepotPhysique)
                                                <i class="fa fa-check text-success me-2"></i>
                                            @else
                                                <i class="fa fa-close text-danger me-2"></i>
                                            @endif
                                            {{ $demande->Code }}
                                        </td>
                                        <td>{{ $demande->NPI }}</td>
                                        <td>{{ $demande->Nom . ' ' . $demande->Prenom }}</td>



                                        <td>{{ $demande->CycleSollicite }}</td>

                                        <td>{{ $demande->Observation }}</td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                                    <a class="dropdown-item"
                                                        href="{{ route('demandes.valider-depot', $demande->id) }}"><i
                                                            class="fa fa-check me-2"></i>
                                                        {{ __('Valider dépot physique') }}</a>


                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modalDemande{{ $demande->id }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Détails') }}</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('demandes.show', $demande->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Modifier') }}</a>

                                                    <div class="dropdown-divider"></div>
                                                    <form action="{{ route('demandes.destroy', $demande->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger"><i
                                                                class="fa fa-fw fa-trash"></i>
                                                            {{ __('Supprimer') }}</button>
                                                    </form>
                                                </div>
                                            </div>
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
