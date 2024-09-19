@php
    $pagetitle = 'Détails Formulaire';
    $breadcrumbs = ['Liste des Formulaire' => route('formulaires.index'), 'Détails Formulaire' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails Formulaire
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('formulaires.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">



                            <div class="col-lg-4">
                                <strong class="text-dark ">Type formulaire:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $formulaire->typeFormulaire()->first()->LibelleTypeFormulaire }}" readonly>
                            </div>

                            <div class="col-lg-4">
                                <strong class="text-dark ">Titre:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $formulaire->Titre }}" readonly>
                            </div>

                            <div class="col-lg-4">
                                <strong class="text-dark ">Description:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $formulaire->Description }}" readonly>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            @include('formulaire.partials.champs-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
