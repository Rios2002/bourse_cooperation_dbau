@php
    $pagetitle = 'Liste des Demande(s)';
    $breadcrumbs = ['Liste des Demande(s)' => route('demandes.index')];
@endphp

@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-body">

            <form>
                <div class="form-group">

                    <h5 for="">Rechercher une demande</h5>
                    <p>Saisir le code de la demande / Nom / Prénom / NPI</p>
                    <div class="input-group">

                        <input type="text" class="form-control rounded-0" value="{{ request()->search ?? '' }}"
                            name="search" style="padding-right: 30px;">


                        <button class="btn px-3 btn-secondary text-center" type="submit">
                            <iconify-icon icon="icon-park-twotone:search" class="fs-6 aside-icon"></iconify-icon>
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <form>
                <h5 for="">Bourse concerné</h5>
                <p>Sélectionner la bourse concerné</p>
                <div class="form-group">




                    <select class="form-select select2 rounded-0" name="bourse_id">
                        <option value="">-- Sélectionner --</option>
                        @foreach ($bourses as $bourse)
                            <option value="{{ $bourse->id }}" @if (request()->bourse_id == $bourse->id) selected @endif>
                                {{ $bourse->LibelleBourse }}</option>
                        @endforeach
                    </select>



                </div>
                <button type="submit" class="btn btn-primary rounded-05 mt-3">
                    <i class="fa fa-eye me-2"></i>
                    Afficher
                </button>
            </form>
        </div>
    </div>
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


                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Demande(s)</h5>
                            <span>Liste des Demande(s)</span>
                            <hr>
                        </div>
                        @foreach ($demandes as $demande)
                            @include('demande.show-modal')
                        @endforeach
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
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
                                            <td>{{ ++$i }}</td>

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
                                                        <a class="dropdown-item"
                                                            href="{{ route('bourses-postuler-download', $demande->bourse_id, $demande->id) }}"><i
                                                                class="fa fa-pdf me-2"></i>
                                                            {{ __('Fiche de demande') }}</a>

                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#modalDemande{{ $demande->id }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Détails') }}</a>
                                                        {{-- <a class="dropdown-item"
                                                            href="{{ route('demandes.show', $demande->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Modifier') }}</a> --}}

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
                {!! $demandes->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
