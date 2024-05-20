@php
    $pagetitle = 'Liste des Demande(s)';
    $breadcrumbs = ['Liste des Demande(s)' => route('demandes.index')];
@endphp

@extends('layouts.app')


@section('content')
    <div class="">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">



                    <div class="card-body">
                      @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="text-end">
                            <a href="{{ route('demandes.create') }}" class="btn btn-sm btn-primary"> Nouveau</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Demande(s)</h5>
                            <span>Liste des Demande(s)</span>
                            <hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>N°</th>
                                        
									<th >Bourse Id</th>
									<th >User Id</th>
									<th >Code</th>
									<th >Npi</th>
									<th >Nom</th>
									<th >Prenom</th>
									<th >Datenaissance</th>
									<th >Lieunaissance</th>
									<th >Sexe</th>
									<th >Codediplome</th>
									<th >Serieoufilierebase</th>
									<th >Anneeobtention</th>
									<th >Moyenne</th>
									<th >Mention</th>
									<th >Cyclesollicite</th>
									<th >Filieremanuel</th>
									<th >Filiere Id</th>
									<th >Libellefiliere</th>
									<th >Statutallocataire</th>
									<th >Contact</th>
									<th >Contactparent</th>
									<th >Depotphysique</th>
									<th >Statuttraitement</th>
									<th >Observation</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($demandes as $demande)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $demande->bourse_id }}</td>
										<td >{{ $demande->user_id }}</td>
										<td >{{ $demande->Code }}</td>
										<td >{{ $demande->NPI }}</td>
										<td >{{ $demande->Nom }}</td>
										<td >{{ $demande->Prenom }}</td>
										<td >{{ $demande->DateNaissance }}</td>
										<td >{{ $demande->LieuNaissance }}</td>
										<td >{{ $demande->Sexe }}</td>
										<td >{{ $demande->CodeDiplome }}</td>
										<td >{{ $demande->SerieOuFiliereBase }}</td>
										<td >{{ $demande->AnneeObtention }}</td>
										<td >{{ $demande->Moyenne }}</td>
										<td >{{ $demande->Mention }}</td>
										<td >{{ $demande->CycleSollicite }}</td>
										<td >{{ $demande->FiliereManuel }}</td>
										<td >{{ $demande->filiere_id }}</td>
										<td >{{ $demande->LibelleFiliere }}</td>
										<td >{{ $demande->StatutAllocataire }}</td>
										<td >{{ $demande->Contact }}</td>
										<td >{{ $demande->ContactParent }}</td>
										<td >{{ $demande->DepotPhysique }}</td>
										<td >{{ $demande->StatutTraitement }}</td>
										<td >{{ $demande->Observation }}</td>

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('demandes.show',$demande->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Détails') }}</a>
                                                        <a class="dropdown-item" href="{{ route('demandes.edit',$demande->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('demandes.destroy',$demande->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger"><i class="fa fa-fw fa-trash"></i> {{ __('Supprimer') }}</button>
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
                {!! $demandes->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
