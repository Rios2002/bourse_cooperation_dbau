@php
    $pagetitle = 'Détails Cycle';
    $breadcrumbs = ['Liste des Cycle' => route('cycles.index'), 'Détails Cycle' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails  Cycle
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('cycles.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">

                            

                        <div class="col-lg-4">
                            <strong class="text-dark ">Codecycle:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $cycle->CodeCycle }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Libellecycle:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $cycle->LibelleCycle }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Iswritable:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $cycle->isWritable }}"
                                readonly>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
