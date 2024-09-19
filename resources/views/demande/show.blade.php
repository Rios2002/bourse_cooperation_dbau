@php
    $pagetitle = 'Détails Demande';
    $breadcrumbs = ['Liste des Demande' => route('demandes.index'), 'Détails Demande' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails Demande
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('demandes.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>

                        @include('demande.show-content')

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
