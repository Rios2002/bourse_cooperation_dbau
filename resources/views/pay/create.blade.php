@php
    $pagetitle = 'Nouveau Pay';
    $breadcrumbs = ['Liste des Pay(s)' => route('pays.index'), 'Nouveau Pay' => route('pays.create')];
@endphp
@extends('layouts.app')

@section('template_title')
    Nouveau Pay
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('pays.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Pay</h5>
                            <span>Formulaire d'ajout d'un(e)  Pay</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('pays.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('pay.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
