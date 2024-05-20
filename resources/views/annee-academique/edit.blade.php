@php
    $pagetitle = 'Modifier Annee Academique';
    $breadcrumbs = [
        'Liste des Annee Academique(s)' => route('annee-academiques.index'),
        'Modifier Annee Academique' => '',
    ];
@endphp
@extends('layouts.app')

@section('template_title')
    Formulaire de modification: Annee Academique
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('annee-academiques.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Annee Academique</h5>
                            <span>Formulaire de modification: Annee Academique</span>
                            <hr>
                        </div>
                        <form method="POST"
                            action="{{ route('annee-academiques.update', $anneeAcademique->CodeAnneeAcademique) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('annee-academique.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
