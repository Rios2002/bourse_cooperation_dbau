@php
    $pagetitle = 'Nouveau Bourse';
    $breadcrumbs = ['Liste des Bourse(s)' => route('bourses.index'), 'Nouveau Bourse' => route('bourses.create')];
@endphp
@extends('layouts.app')

@section('template_title')
    Nouveau Bourse
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('bourses.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Bourse</h5>
                            <span>Formulaire d'ajout d'un(e)  Bourse</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('bourses.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('bourse.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
