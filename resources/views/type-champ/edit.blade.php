@php
    $pagetitle = 'Modifier Type Champ';
    $breadcrumbs = ['Liste des Type Champ(s)' => route('type-champs.index'), 'Modifier Type Champ' => ''];
@endphp
@extends('layouts.app')

@section('template_title')
    Formulaire de modification: Type Champ
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('type-champs.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Type Champ</h5>
                            <span>Formulaire de modification: Type Champ</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('type-champs.update', $typeChamp->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('type-champ.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
