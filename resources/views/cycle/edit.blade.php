@php
    $pagetitle = 'Modifier Cycle';
    $breadcrumbs = ['Liste des Cycle(s)' => route('cycles.index'), 'Modifier Cycle' => ''];
@endphp
@extends('layouts.app')

@section('template_title')
    Formulaire de modification: Cycle
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('cycles.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Cycle</h5>
                            <span>Formulaire de modification: Cycle</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('cycles.update', $cycle->CodeCycle) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('cycle.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
