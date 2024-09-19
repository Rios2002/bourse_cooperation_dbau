@php
    $pagetitle = 'Détails Piece Jointe';
    $breadcrumbs = ['Liste des Piece Jointe' => route('piece-jointes.index'), 'Détails Piece Jointe' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails  Piece Jointe
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('piece-jointes.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">

                            

                        <div class="col-lg-4">
                            <strong class="text-dark ">Libelle:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $pieceJointe->Libelle }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Description:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $pieceJointe->Description }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Taillemax:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $pieceJointe->TailleMax }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Typefichier:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $pieceJointe->TypeFichier }}"
                                readonly>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
