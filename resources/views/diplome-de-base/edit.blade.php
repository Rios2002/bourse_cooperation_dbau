@php
    $pagetitle = 'Modifier Diplome De Base';
    $breadcrumbs = [
        'Liste des Diplome De Base(s)' => route('diplome-de-bases.index'),
        'Modifier Diplome De Base' => '',
    ];
@endphp
@extends('layouts.app')

@section('template_title')
    Formulaire de modification: Diplome De Base
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('diplome-de-bases.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Diplome De Base</h5>
                            <span>Formulaire de modification: Diplome De Base</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('diplome-de-bases.update', $diplomeDeBase->CodeDiplome) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('diplome-de-base.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
