@php
    $pagetitle = 'Détails Annee Academique';
    $breadcrumbs = ['Liste des Annee Academique' => route('annee-academiques.index'), 'Détails Annee Academique' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails  Annee Academique
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('annee-academiques.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">

                            

                        <div class="col-lg-4">
                            <strong class="text-dark ">Codeanneeacademique:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $anneeAcademique->CodeAnneeAcademique }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Libelleanneeacademique:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $anneeAcademique->LibelleAnneeAcademique }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Anneedebut:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $anneeAcademique->AnneeDebut }}"
                                readonly>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
