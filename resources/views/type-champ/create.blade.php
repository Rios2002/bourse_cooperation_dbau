@php
    $pagetitle = 'Nouveau Type Champ';
    $breadcrumbs = ['Liste des Type Champ(s)' => route('type-champs.index'), 'Nouveau Type Champ' => route('type-champs.create')];
@endphp
@extends('layouts.app')

@section('template_title')
    Nouveau Type Champ
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('type-champs.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Type Champ</h5>
                            <span>Formulaire d'ajout d'un(e)  Type Champ</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('type-champs.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('type-champ.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
