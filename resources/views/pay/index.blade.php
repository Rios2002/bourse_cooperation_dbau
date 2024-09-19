@php
    $pagetitle = 'Liste des Pay(s)';
    $breadcrumbs = ['Liste des Pay(s)' => route('pays.index')];
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
                            <a href="{{ route('pays.create') }}" class="btn btn-sm btn-primary"> Nouveau</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Pay(s)</h5>
                            <span>Liste des Pay(s)</span>
                            <hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Codepays</th>
                                        <th>Libellepays</th>
                                        <th>Nationalite</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pays as $pay)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $pay->CodePays }}</td>
                                            <td>{{ $pay->LibellePays }}</td>
                                            <td>{{ $pay->Nationalite }}</td>

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="{{ route('pays.show', $pay->CodePays) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Détails') }}</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('pays.edit', $pay->CodePays) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('pays.destroy', $pay->CodePays) }}"
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
                {!! $pays->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
