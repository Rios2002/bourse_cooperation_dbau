@php
    $pagetitle = 'Détails Type Champ';
    $breadcrumbs = ['Liste des Type Champ' => route('type-champs.index'), 'Détails Type Champ' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails Type Champ
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('type-champs.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">



                            <div class="col-lg-4">
                                <strong class="text-dark ">Codetypechamp:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $typeChamp->CodeTypeChamp }}" readonly>
                            </div>

                            <div class="col-lg-4">
                                <strong class="text-dark ">Libelletypechamp:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $typeChamp->LibelleTypeChamp }}" readonly>
                            </div>

                            <div class="col-lg-4">
                                <strong class="text-dark ">Spatiefunction:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $typeChamp->SpatieFunction }}" readonly>
                            </div>

                            <div class="col-lg-4">
                                <strong class="text-dark ">Classcss:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $typeChamp->ClassCSS }}" readonly>
                            </div>

                            <div class="col-lg-4">
                                <strong class="text-dark ">Spatieattributes:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $typeChamp->SpatieAttributes }}" readonly>
                            </div>

                            <div class="col-lg-4">
                                <strong class="text-dark ">Codetypesortie:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $typeChamp->CodeTypeSortie }}" readonly>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">


                                <h5>Attributs : </h5>

                                <div class="list-group">
                                    @foreach ($attributs as $attr)
                                        <p class="list-group-item list-group-item-action text-dark">
                                            {{ $attr->Description }} :
                                            <br>
                                            <strong>
                                                <mark class="text-dark">
                                                    {{ $attr->SpatieFunction }}
                                                </mark>
                                            </strong>
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
