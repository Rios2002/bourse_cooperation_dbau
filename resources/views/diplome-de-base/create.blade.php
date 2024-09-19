@php
    $pagetitle = 'Nouveau Diplome De Base';
    $breadcrumbs = ['Liste des Diplome De Base(s)' => route('diplome-de-bases.index'), 'Nouveau Diplome De Base' => route('diplome-de-bases.create')];
@endphp
@extends('layouts.app')

@section('template_title')
    Nouveau Diplome De Base
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('diplome-de-bases.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Diplome De Base</h5>
                            <span>Formulaire d'ajout d'un(e)  Diplome De Base</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('diplome-de-bases.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('diplome-de-base.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
