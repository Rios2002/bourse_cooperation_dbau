@php
    $pagetitle = 'Détails Demande';
    $breadcrumbs = ['Liste des Demande' => route('demandes.index'), 'Détails Demande' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails  Demande
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('demandes.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">

                            

                        <div class="col-lg-4">
                            <strong class="text-dark ">Bourse Id:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->bourse_id }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">User Id:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->user_id }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Code:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Code }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Npi:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->NPI }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Nom:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Nom }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Prenom:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Prenom }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Datenaissance:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->DateNaissance }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Lieunaissance:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->LieuNaissance }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Sexe:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Sexe }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Codediplome:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->CodeDiplome }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Serieoufilierebase:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->SerieOuFiliereBase }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Anneeobtention:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->AnneeObtention }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Moyenne:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Moyenne }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Mention:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Mention }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Cyclesollicite:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->CycleSollicite }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Filieremanuel:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->FiliereManuel }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Filiere Id:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->filiere_id }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Libellefiliere:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->LibelleFiliere }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Statutallocataire:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->StatutAllocataire }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Contact:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Contact }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Contactparent:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->ContactParent }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Depotphysique:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->DepotPhysique }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Statuttraitement:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->StatutTraitement }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Observation:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Observation }}"
                                readonly>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
