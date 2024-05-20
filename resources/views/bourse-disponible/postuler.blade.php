@php
    $pagetitle = 'Postuler à : ' . $bourse->LibelleBourse;
    $breadcrumbs = ['Bourses en cours' => route('bourses.index')];
@endphp

@extends('layouts.app')


@section('content')
    @if ($mesDemandesDeLaBourse->count() == 0)
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-4">
                        <strong class="text-dark ">Pays:</strong>
                        <input type="text" class="form-control rounded-05 my-1 text-dark border-0"
                            value="{{ $bourse->pays()->first()->LibellePays }}" readonly>
                    </div>

                    <div class="col-lg-8">
                        <strong class="text-dark ">Désignation :</strong>
                        <input type="text" class="form-control rounded-05 my-1 text-dark border-0"
                            value="{{ $bourse->LibelleBourse }}" readonly>
                    </div>

                    <div class="col-lg-12">
                        <strong class="text-dark ">Description :</strong>
                        <textarea name="" id="" rows="2" readonly class="form-control rounded-05 my-1 text-dark border-0">{{ $bourse->Description }}</textarea>

                    </div>
                    <div class="col-lg-6">
                        <strong class="text-dark ">Année Académique :</strong>
                        <input type="text" class="form-control rounded-05 my-1 text-dark border-0"
                            value="{{ $bourse->CodeAnneeAcademique }}" readonly>
                    </div>
                    <div class="col-lg-6">
                        <strong class="text-dark ">Période d'inscription :</strong>
                        <input type="text" class="form-control rounded-05 my-1 text-dark border-0"
                            value="{{ $bourse->periode() }}" readonly>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-end mt-3">
                            <a href="{{ route('bourses-postuler-process', [$bourse->id, 'start' => 'now']) }}"
                                class="btn btn-warning rounded-1 ">Démarer</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="text-end">
                    <a href="{{ route('bourses-postuler-process', [$bourse->id, 'start' => 'now']) }}"
                        class="btn btn-warning rounded-1 mb-3">
                        <i class="fa fa-add me-2"></i>
                        Nouvelle demande</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped ">
                        <thead class="text-dark fw-bold  ">

                            <th>Code</th>
                            <th>Date de création</th>
                            <th>Statut</th>
                            <th>Actions</th>

                        </thead>
                        <tbody>
                            @foreach ($mesDemandesDeLaBourse as $demande)
                                <tr>
                                    <td>{{ $demande->Code }}</td>
                                    <td>{{ $demande->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $demande->getStatusTraitement() }} </td>
                                    <td>
                                    <td>
                                        <div class="dropdown ">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                @if ($demande->getStatusTraitement() == 'EN ATTENTE DE FINALISATION')
                                                    <a class="dropdown-item"
                                                        href="{{ route('bourses-postuler-process', [$bourse->id, 'reference' => $demande->Code]) }}">Continuer</a>
                                                @else
                                                    <a class="dropdown-item"
                                                        href="{{ route('bourses-postuler-process', [$bourse->id, 'reference' => $demande->Code]) }}">Détails</a>
                                                @endif


                                            </div>
                                        </div>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection
