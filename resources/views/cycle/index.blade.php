@php
    $pagetitle = 'Liste des Cycle(s)';
    $breadcrumbs = ['Liste des Cycle(s)' => route('cycles.index')];
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
                            <a href="{{ route('cycles.create') }}" class="btn btn-sm btn-primary"> Nouveau</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Cycle(s)</h5>
                            <span>Liste des Cycle(s)</span>
                            <hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Codecycle</th>
                                        <th>Libellé Cycle</th>
                                        {{-- <th>Iswritable</th> --}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cycles as $cycle)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $cycle->CodeCycle }}
                                                @if ($cycle->isWritable == false)
                                                    <span class=" badge rounded-pill text-bg-warning text-white ms-2">Non
                                                        modifiable</span>
                                                @endif
                                            </td>
                                            <td>{{ $cycle->LibelleCycle }}</td>
                                            {{-- <td>{{ $cycle->isWritable }}</td> --}}

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="{{ route('cycles.show', $cycle->CodeCycle) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Détails') }}</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('cycles.edit', $cycle->CodeCycle) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('cycles.destroy', $cycle->CodeCycle) }}"
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
                {!! $cycles->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
