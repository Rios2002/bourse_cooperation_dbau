@php
    $pagetitle = 'Liste des Bourses disponible';
    $breadcrumbs = ['Bourses en cours' => route('bourses.index')];
@endphp

@extends('layouts.app')


@section('content')
    <div class="row">
        @forelse ($bourses as $brs)
            {{-- col-lg-4 col-sm-6 --}}
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://flagcdn.com/{{ strtolower($brs->CodePays) }}.svg"
                                class="border w-100 rounded-3 mb-3">
                        </div>

                        <div class="text-dark">

                            <h5 class="card-title">{{ $brs->LibelleBourse }}</h5>
                            <small>
                                Pays : <span class="fw-bold"> {{ $brs->pays()->first()->LibellePays }} </span> | Ann. Acad. :
                                {{ $brs->CodeAnneeAcademique }}
                            </small>
                            <hr>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ asset($brs->Communique) }}" target="_blank"
                                    class="btn btn-light text-nowrap rounded-2 w-100 mb-1 ">
                                    <i class="fa fa-download me-1"></i>
                                    Communiqué</a>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{ route('bourses-postuler', $brs->id) }}"
                                    class="btn btn-warning text-nowrap rounded-2 w-100 mb-1">
                                    <i class="fa fa-paper-plane me-2"></i>
                                    Postuler</a>
                            </div>
                        </div>

                        {{-- <a href="{{ route('bourses.show', $brs->id) }}" class="btn btn-warning">En savoir plus</a> --}}
                    </div>

                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('asset_perso/empty_box.png') }}" height="200" class="mb-4">
                    <h5>Aucune bourse disponible pour le moment</h5>
                    <p>
                        Veuillez revenir ultérieurement
                    </p>
                </div>
            </div>
        @endforelse
    </div>
@endsection
