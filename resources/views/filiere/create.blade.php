@php
    $pagetitle = 'Nouveau Filiere';
    $breadcrumbs = ['Liste des Filiere(s)' => route('filieres.index'), 'Nouveau Filiere' => route('filieres.create')];
@endphp
@extends('layouts.app')

@section('template_title')
    Nouveau Filiere
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('filieres.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Filiere</h5>
                            <span>Formulaire d'ajout d'un(e)  Filiere</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('filieres.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('filiere.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
