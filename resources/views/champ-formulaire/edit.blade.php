@php
    $pagetitle = 'Modifier Champ Formulaire';
    $breadcrumbs = ['Liste des Champ Formulaire(s)' => route('champ-formulaires.index'), 'Modifier Champ Formulaire' => ''];
@endphp
@extends('layouts.app')

@section('template_title')
    Formulaire de modification: Champ Formulaire
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('champ-formulaires.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Champ Formulaire</h5>
                            <span>Formulaire de modification: Champ Formulaire</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('champ-formulaires.update', $champFormulaire->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('champ-formulaire.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
