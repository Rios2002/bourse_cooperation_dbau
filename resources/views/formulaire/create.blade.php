@php
    $pagetitle = 'Nouveau Formulaire';
    $breadcrumbs = ['Liste des Formulaire(s)' => route('formulaires.index'), 'Nouveau Formulaire' => route('formulaires.create')];
@endphp
@extends('layouts.app')

@section('template_title')
    Nouveau Formulaire
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('formulaires.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Formulaire</h5>
                            <span>Formulaire d'ajout d'un(e)  Formulaire</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('formulaires.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('formulaire.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
