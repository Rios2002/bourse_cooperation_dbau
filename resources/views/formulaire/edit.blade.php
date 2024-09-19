@php
    $pagetitle = 'Modifier Formulaire';
    $breadcrumbs = ['Liste des Formulaire(s)' => route('formulaires.index'), 'Modifier Formulaire' => ''];
@endphp
@extends('layouts.app')

@section('template_title')
    Formulaire de modification: Formulaire
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('formulaires.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Formulaire</h5>
                            <span>Formulaire de modification: Formulaire</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('formulaires.update', $formulaire->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('formulaire.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
