@php
    $pagetitle = 'Nouveau Annee Academique';
    $breadcrumbs = ['Liste des Annee Academique(s)' => route('annee-academiques.index'), 'Nouveau Annee Academique' => route('annee-academiques.create')];
@endphp
@extends('layouts.app')

@section('template_title')
    Nouveau Annee Academique
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('annee-academiques.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Annee Academique</h5>
                            <span>Formulaire d'ajout d'un(e)  Annee Academique</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('annee-academiques.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('annee-academique.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
