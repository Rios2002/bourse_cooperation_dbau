@php
    $pagetitle = 'Modifier Piece Jointe';
    $breadcrumbs = ['Liste des Piece Jointe(s)' => route('piece-jointes.index'), 'Modifier Piece Jointe' => ''];
@endphp
@extends('layouts.app')

@section('template_title')
    Formulaire de modification: Piece Jointe
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('piece-jointes.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Piece Jointe</h5>
                            <span>Formulaire de modification: Piece Jointe</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('piece-jointes.update', $pieceJointe->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('piece-jointe.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
