@php
    $pagetitle = 'Détails Pay';
    $breadcrumbs = ['Liste des Pay' => route('pays.index'), 'Détails Pay' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails  Pay
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('pays.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">

                            

                        <div class="col-lg-4">
                            <strong class="text-dark ">Codepays:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $pay->CodePays }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Libellepays:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $pay->LibellePays }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Nationalite:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $pay->Nationalite }}"
                                readonly>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
