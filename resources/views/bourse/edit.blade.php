@php
    $pagetitle = 'Modifier Bourse';
    $breadcrumbs = ['Liste des Bourse(s)' => route('bourses.index'), 'Modifier Bourse' => ''];
@endphp
@extends('layouts.app')

@section('template_title')
    Formulaire de modification: Bourse
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('bourses.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Bourse</h5>
                            <span>Formulaire de modification: Bourse</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('bourses.update', $bourse->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('bourse.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
