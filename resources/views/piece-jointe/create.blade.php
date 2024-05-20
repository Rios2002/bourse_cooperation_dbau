@php
    $pagetitle = 'Nouveau Piece Jointe';
    $breadcrumbs = ['Liste des Piece Jointe(s)' => route('piece-jointes.index'), 'Nouveau Piece Jointe' => route('piece-jointes.create')];
@endphp
@extends('layouts.app')

@section('template_title')
    Nouveau Piece Jointe
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('piece-jointes.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Piece Jointe</h5>
                            <span>Formulaire d'ajout d'un(e)  Piece Jointe</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('piece-jointes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('piece-jointe.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
