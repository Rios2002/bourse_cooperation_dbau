@php
    $pagetitle = 'Nouveau Demande';
    $breadcrumbs = ['Liste des Demande(s)' => route('demandes.index'), 'Nouveau Demande' => route('demandes.create')];
@endphp
@extends('layouts.app')

@section('template_title')
    Nouveau Demande
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('demandes.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Demande</h5>
                            <span>Formulaire d'ajout d'un(e)  Demande</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('demandes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('demande.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
