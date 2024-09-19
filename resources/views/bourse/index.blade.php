@php
    $pagetitle = 'Liste des Bourse(s)';
    $breadcrumbs = ['Liste des Bourse(s)' => route('bourses.index')];
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
                            <a href="{{ route('bourses.create') }}" class="btn btn-sm btn-primary"> Nouveau</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Bourse(s)</h5>
                            <span>Liste des Bourse(s)</span>
                            <hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>N°</th>

                                        <th>Pays</th>
                                        <th>Année Acad.</th>
                                        <th>Libelle</th>


                                        <th>Fermeture</th>


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bourses as $bourse)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $bourse->pays()->first()->LibellePays }}</td>
                                            <td>{{ $bourse->CodeAnneeAcademique }}</td>
                                            <td>{{ Str::limit($bourse->LibelleBourse, 30) }}
                                                @if ($bourse->estActif())
                                                    <span
                                                        class=" badge rounded-pill text-bg-success text-white ms-2">Actif</span>
                                                @endif
                                            </td>




                                            <td>{{ $bourse->DateFermeture }}</td>


                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="{{ route('bourses.show', $bourse->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Détails') }}</a>
                                                        <a class="dropdown-item" href="{{ asset($bourse->Communique) }}"
                                                            target="_blank"><i class="fa fa-fw fa-eye"></i>
                                                            {{ __('Voir Communiqué') }}</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('bourses.toggle_publish', $bourse->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i>
                                                            @if ($bourse->estActif())
                                                                Dépublier
                                                            @else
                                                                Publier
                                                            @endif
                                                            la bourse
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('bourses.edit', $bourse->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('bourses.destroy', $bourse->id) }}"
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
                {!! $bourses->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
