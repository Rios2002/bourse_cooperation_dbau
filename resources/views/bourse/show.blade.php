@php
    $pagetitle = 'Détails Bourse';
    $breadcrumbs = ['Liste des Bourse' => route('bourses.index'), 'Détails Bourse' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails Bourse
@endsection

@section('content')
    <div class="">
        <div class="mb-4">

            <ul class="nav nav-underline d-flex justify-content-center " id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="active-tab" data-bs-toggle="tab" href="#tabConfig" role="tab"
                        aria-controls="active" aria-expanded="true" aria-selected="true">
                        <span>Configuration</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="link2-tab" data-bs-toggle="tab" href="#tabFormulaire" role="tab"
                        aria-controls="link2" aria-selected="false" tabindex="-1">
                        <span>Formulaire</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="link1-tab" data-bs-toggle="tab" href="#tabDemandes" role="tab"
                        aria-controls="link1" aria-selected="false" tabindex="-1">
                        <span>Demandes</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="link2-tab" data-bs-toggle="tab" href="#tabStatistique" role="tab"
                        aria-controls="tabStatistique" aria-selected="false" tabindex="-1">
                        <span>Statistique</span>
                    </a>
                </li>


            </ul>

        </div>
    </div>

    <section class="">
        <div class="tab-content tabcontent-border p-3" id="myTabContent">
            @include('bourse.tabs.configuration')
            @include('bourse.tabs.demandes')
            @include('bourse.tabs.formulaire-tab')
            @include('bourse.tabs.statistique')
        </div>

    </section>
@endsection
