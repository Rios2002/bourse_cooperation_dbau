@php
    $pagetitle = 'Modifier Pay';
    $breadcrumbs = ['Liste des Pay(s)' => route('pays.index'), 'Modifier Pay' => ''];
@endphp
@extends('layouts.app')

@section('template_title')
    Formulaire de modification: Pay
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('pays.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Pay</h5>
                            <span>Formulaire de modification: Pay</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('pays.update', $pay->CodePays) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('pay.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
