@php
    $pagetitle = 'Détails Diplome De Base';
    $breadcrumbs = ['Liste des Diplome De Base' => route('diplome-de-bases.index'), 'Détails Diplome De Base' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails  Diplome De Base
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('diplome-de-bases.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">

                            

                        <div class="col-lg-4">
                            <strong class="text-dark ">Codediplome:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $diplomeDeBase->CodeDiplome }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Libellediplome:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $diplomeDeBase->LibelleDiplome }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Cyclecible:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $diplomeDeBase->CycleCible }}"
                                readonly>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
