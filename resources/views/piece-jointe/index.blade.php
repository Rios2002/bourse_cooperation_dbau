@php
    $pagetitle = 'Liste des Piece Jointe(s)';
    $breadcrumbs = ['Liste des Piece Jointe(s)' => route('piece-jointes.index')];
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
                            <a href="{{ route('piece-jointes.create') }}" class="btn btn-sm btn-primary"> Nouveau</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Piece Jointe(s)</h5>
                            <span>Liste des Piece Jointe(s)</span>
                            <hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Libelle</th>
									<th >Description</th>
									<th >Taillemax</th>
									<th >Typefichier</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pieceJointes as $pieceJointe)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $pieceJointe->Libelle }}</td>
										<td >{{ $pieceJointe->Description }}</td>
										<td >{{ $pieceJointe->TailleMax }}</td>
										<td >{{ $pieceJointe->TypeFichier }}</td>

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('piece-jointes.show',$pieceJointe->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Détails') }}</a>
                                                        <a class="dropdown-item" href="{{ route('piece-jointes.edit',$pieceJointe->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('piece-jointes.destroy',$pieceJointe->id) }}" method="POST">
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
                {!! $pieceJointes->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
