<style>


</style>
<!DOCTYPE html>
<html lang="fr">
@php

@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css --}}
    {{-- <link rel="stylesheet" href="{{ asset('bs5assets/css/styles.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('bs5assets/fonts/font-awesome.min.css') }}"> --}}
</head>

<body style=" font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
    <center>

        <img src="https://beraca-transport.net/EGLISEDEVILLE/dbau-barner.png" alt="">
    </center>

    {{-- <img src="https://upload.wikimedia.org/wikipedia/commons/1/13/Coat_of_arms_of_Benin.svg?download" alt=""> --}}

    {{-- <img src="{{ storage_path('app/public/v.png') }}" alt=""> --}}
    <style>
        .btn-style {
            background-color: rgba(0, 0, 0, .05);
            /* border: 1px dashed grey; */
            padding: 5px;
        }

        .col-auto {
            margin-bottom: 10px;
        }

        td {
            padding: 5px;
        }

        tr {
            margin: 3px;
        }

        .form-group {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
    <center>
        <h2 style="text-decoration: underline">Direction des Bourses et Aides Universitaire</h2>

        <h3 class="mb-3"> Fiche d'inscription : {{ $bourse->LibelleBourse }} </h4>
    </center>


    <table style="width: 100%" border="1px dashed grey">
        <tr>
            <td>
                <strong>Code Demande</strong>
                <div class="btn-style">
                    <div class='btn-style'>{{ $demande->Code }}</div>
                </div>
            </td>
            <td colspan="2">
                <strong>Nom</strong>
                <div class="btn-style">
                    <div class='btn-style'>{{ $demande->Nom }}</div>
                </div>
            </td>
            <td colspan="3">
                <strong>Prénoms</strong>
                <div class="btn-style">
                    <div class='btn-style'>{{ $demande->Prenom }}</div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Date Naissance:</strong>
                <div class='btn-style'>{{ $demande->DateNaissance->format('d/m/Y') }}</div>
            </td>

            <td>
                <strong>Sexe:</strong>
                <div class='btn-style'>{{ $demande->Sexe }}</div>
            </td>

            <td colspan="3">
                <strong>Lieu Naissance:</strong>
                <div class='btn-style'>{{ $demande->LieuNaissance }}</div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <strong>Diplome de base:</strong>
                <div class='btn-style'>
                    {{ $demande->CodeDiplome . ' | ' . $demande->SerieOuFiliereBase }}
                </div>
            </td>
            <td colspan="3">
                <strong>Diplome de base (Année | Moy | Mention ) :</strong>
                <div class='btn-style'>
                    {{ $demande->AnneeObtention . ' | ' . $demande->Moyenne . ' | ' . $demande->Mention }}
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <strong>Niveau & Filière sollicité:</strong>
                <div class='btn-style'>
                    {{ $demande->CycleSollicite . ' | ' . $demande->LibelleFiliere }}
                </div>
            </td>
        </tr>
        <tr>
            <td> <strong>Status Bourse:</strong>
                <div class='btn-style'>{{ $demande->StatutAllocataire }}</div>
            </td>
            <td colspan="3"><strong>Contact Whatsapp:</strong>
                <div class='btn-style'>{{ $demande->Contact }}</div>
            </td>
            <td colspan="2"><strong>Contact Parent:</strong>
                <div class='btn-style'>{{ $demande->ContactParent }}</div>
            </td>
        </tr>

        @foreach ($demande->getChampsComplementaire() as $key => $value)
            <tr>
                <td colspan="6">

                    <strong>{{ $key ?? '' }} :</strong>
                    <div class='btn-style'>{{ $value ?? '' }}</div>

                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="6">

                @forelse ($demande->piecesJointes()->get() as $pj)
                    {{-- @forelse ($demande->pieceJointes() as $pj) --}}


                    <div class="form-group">
                        <label for="" class="mb-3">
                            @if ($demande->getPieceJointe($pj->id))
                                <i class="fa fa-check text-success me-2 fs-6"></i>
                            @else
                                <i class="fa fa-close text-danger me-2 fs-6"></i>
                            @endif
                            <span class="fw-bold text-dark ">{{ $pj->Libelle }}</span>
                        </label>
                    </div>

                @empty
                @endforelse


            </td>

        </tr>
    </table>
    <div style="text-align: end ; margin-top:15px; width: 100%; float:right;">
        <label for=""> <strong>Demande émise le : </strong> <br>
            {{ \Carbon\Carbon::parse($demande->created_at)->translatedFormat('d F Y à H\hi') }}</label>
        <br>
        <label for=""> <strong> Imprimée le :</strong> <br>
            {{ \Carbon\Carbon::parse(date('d-m-Y'))->translatedFormat('d F Y ') }}

    </div>



</body>

</html>
