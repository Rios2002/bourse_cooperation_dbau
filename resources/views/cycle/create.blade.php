@php
    $pagetitle = 'Nouveau Cycle';
    $breadcrumbs = ['Liste des Cycle(s)' => route('cycles.index'), 'Nouveau Cycle' => route('cycles.create')];
@endphp
@extends('layouts.app')

@section('template_title')
    Nouveau Cycle
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('cycles.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Cycle</h5>
                            <span>Formulaire d'ajout d'un(e)  Cycle</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('cycles.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('cycle.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
