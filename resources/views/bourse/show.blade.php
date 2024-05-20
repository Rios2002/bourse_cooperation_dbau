@php
    $pagetitle = 'Détails Bourse';
    $breadcrumbs = ['Liste des Bourse' => route('bourses.index'), 'Détails Bourse' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails Bourse
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('bourses.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row align-items-center ">

                            <div class="col-12 mt-3">
                                @if ($bourse->estActif())
                                    <div class="alert alert-success ">
                                        <i class="fa fa-check-circle me-2"></i> Cette Bourse est Active Actuellement,
                                        l'inscription à cette bourse est disponible
                                        <br>
                                        <a href="{{ route('bourses.toggle_publish', $bourse->id) }}"
                                            class="btn btn-dark rounded-05 mt-3 btn-sm py-2 px-3">Dépublier</a>
                                    </div>
                                @else
                                    <div class="alert alert-danger ">
                                        <i class="fa fa-times-circle me-2"></i> Cette Bourse est Inactive Actuellement,
                                        l'inscription à cette bourse n'est pas disponible
                                        @if ($bourse->canBePublished())
                                            <br>
                                            <a href="{{ route('bourses.toggle_publish', $bourse->id) }}"
                                                class="btn btn-dark rounded-05 mt-3 btn-sm py-2 px-3">Publier</a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center ">

                                    <a href="{{ asset($bourse->Communique) }}" target="_blank"
                                        class="btn btn-sm btn-warning rounded-05 text-white my-3"><i
                                            class="fa fa-pdf-file"></i>
                                        Voir le
                                        communiqué</a>
                                    <div class="form-check ms-3">
                                        <input type="checkbox" name="isDisponible"
                                            class="form-check-input @error('isDisponible') is-invalid @enderror rounded-05"
                                            value="1" id="is_disponible" disabled
                                            @if (old('isDisponible', $bourse?->isDisponible ?? true)) checked @endif>
                                        <strong> <label for="is_disponible"
                                                class="form-label">{{ __('Est Disponible') }}</label>
                                            <!-- <strong class="text-danger"> * </strong> --> </strong>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 text-end">


                            </div>

                            <div class="col-lg-4">
                                <strong class="text-dark ">Pays:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $bourse->pays()->first()->LibellePays }}" readonly>
                            </div>

                            <div class="col-lg-8">
                                <strong class="text-dark ">Libellé:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $bourse->LibelleBourse }}" readonly>
                            </div>

                            <div class="col-lg-12">
                                <strong class="text-dark ">Description:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $bourse->Description }}" readonly>


                            </div>
                            <div class="col-lg-4">
                                <strong class="text-dark ">Année académique:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $bourse->CodeAnneeAcademique }}" readonly>


                            </div>




                            <div class="col-lg-4">
                                <strong class="text-dark ">Période :</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $bourse->periode() }}" readonly>
                            </div>



                            <div class="col-lg-4">
                                <strong class="text-dark ">Quota:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $bourse->Quota }}" readonly>
                            </div>

                        </div>
                        <hr class="my-5">

                        <div class="row">
                            @include('bourse.diplome-de-base-form')

                            <hr class="my-5">
                            @include('bourse.piece-jointe-form')

                            <hr class="my-5">
                            @include('bourse.filiere-bourse-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
