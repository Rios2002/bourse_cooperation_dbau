@php
    $pagetitle = 'Liste des Annee Academique(s)';
    $breadcrumbs = ['Liste des Annee Academique(s)' => route('annee-academiques.index')];
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
                            <a href="{{ route('annee-academiques.create') }}" class="btn btn-sm btn-primary"> Nouveau</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Annee Academique(s)</h5>
                            <span>Liste des Annee Academique(s)</span>
                            <hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>N°</th>

                                        {{-- <th>Codeanneeacademique</th> --}}
                                        <th>Année Academique</th>
                                        {{-- <th>Anneedebut</th> --}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anneeAcademiques as $anneeAcademique)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            {{-- <td>{{ $anneeAcademique->CodeAnneeAcademique }}</td> --}}
                                            <td>{{ $anneeAcademique->LibelleAnneeAcademique }}</td>
                                            {{-- <td>{{ $anneeAcademique->AnneeDebut }}</td> --}}

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="{{ route('annee-academiques.show', $anneeAcademique->CodeAnneeAcademique) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Détails') }}</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('annee-academiques.edit', $anneeAcademique->CodeAnneeAcademique) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form
                                                            action="{{ route('annee-academiques.destroy', $anneeAcademique->CodeAnneeAcademique) }}"
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
                {!! $anneeAcademiques->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
