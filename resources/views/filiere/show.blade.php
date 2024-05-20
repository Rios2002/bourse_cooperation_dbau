@php
    $pagetitle = 'Détails Filiere';
    $breadcrumbs = ['Liste des Filiere' => route('filieres.index'), 'Détails Filiere' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails  Filiere
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('filieres.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">

                            

                        <div class="col-lg-4">
                            <strong class="text-dark ">Libellefiliere:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $filiere->LibelleFiliere }}"
                                readonly>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
