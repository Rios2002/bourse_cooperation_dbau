<div class="row">

    <div class="col-lg-12 mb-2">

        @if ($demande->DepotPhysique)
            <div class="badge bg-success ">
                <strong>Depot physique confirmé</strong>
            </div>
        @else
            <div class="badge bg-danger ">
                <strong>Depot physique non confirmé</strong>
            </div>
        @endif


    </div>
    <div class="col-lg-12">
        <div class="alert alert-info">
            Statut Traitement :
            <strong class="text-dark "> {{ $demande->StatutTraitement }} </strong>
        </div>

    </div>
    <div class="col-lg-4">
        <strong class="text-dark ">Bourse :</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark"
            value="{{ $demande->Bourse()->first()->LibelleBourse }}" readonly>
    </div>

    <div class="col-lg-4">
        <strong class="text-dark ">Utilisateur </strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->userStr() }}" readonly>
    </div>

    <div class="col-lg-4">
        <strong class="text-dark ">Code:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Code }}" readonly>
    </div>

    <div class="col-lg-3">
        <strong class="text-dark ">NPI:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->NPI }}" readonly>
    </div>

    <div class="col-lg-4">
        <strong class="text-dark ">Nom:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Nom }}" readonly>
    </div>

    <div class="col-lg-5">
        <strong class="text-dark ">PrenomS:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Prenom }}" readonly>
    </div>

    <div class="col-lg-3">
        <strong class="text-dark ">Date Naissance:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark"
            value="{{ $demande->DateNaissance?->format('d/m/Y') }}" readonly>
    </div>

    <div class="col-lg-4">
        <strong class="text-dark ">Lieu Naissance:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->LieuNaissance }}"
            readonly>
    </div>

    <div class="col-lg-2">
        <strong class="text-dark ">Sexe:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Sexe }}" readonly>
    </div>

    <div class="col-lg-3">
        <strong class="text-dark ">Diplome de base:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->CodeDiplome }}"
            readonly>
    </div>

    <div class="col-lg-4">
        <strong class="text-dark ">Serie / Filière de Base:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->SerieOuFiliereBase }}"
            readonly>
    </div>

    <div class="col-lg-2">
        <strong class="text-dark ">Année Obtention:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->AnneeObtention }}"
            readonly>
    </div>

    <div class="col-lg-3">
        <strong class="text-dark ">Moyenne (Diplome de base):</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Moyenne }}" readonly>
    </div>

    <div class="col-lg-3">
        <strong class="text-dark ">Mention:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Mention }}" readonly>
    </div>

    <div class="col-lg-3">
        <strong class="text-dark ">Cycle Sollicité:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->CycleSollicite }}"
            readonly>
    </div>

    <div class="col-lg-6">
        <strong class="text-dark ">Libellefiliere:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->LibelleFiliere }}"
            readonly>
    </div>

    <div class="col-lg-3">
        <strong class="text-dark ">Statut Allocataire:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->StatutAllocataire }}"
            readonly>
    </div>

    <div class="col-lg-3">
        <strong class="text-dark ">Contact:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Contact }}" readonly>
    </div>

    <div class="col-lg-3">
        <strong class="text-dark ">Contactparent:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->ContactParent }}"
            readonly>
    </div>
    <div class="col-lg-6">
        <strong class="text-dark ">Observation:</strong>
        <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $demande->Observation }}"
            readonly>
    </div>
    <div class="col-12">
        <hr>
    </div>
    @foreach ($demande->getChampsComplementaire() as $key => $value)
        <div class="col-lg-6">
            <strong class="text-dark ">{{ $key ?? '' }} :</strong>
            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $value ?? '' }}"
                readonly>
        </div>
    @endforeach
    <div class="col-12">
        <hr>
        <h5>
            Pièces jointes :
        </h5>
    </div>
    <div class="col-lg-12">
        <ul class="list-group">
            @foreach ($demande->getPiecesJointesValue() as $url => $pieceJointe)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-12">
                            <p>
                                {{ $pieceJointe }}
                            </p>
                            <a href="{{ $url }}" target="_blank"
                                class="btn btn-sm btn-primary  rounded-05">
                                <i class="fa fa-file></i> {{ $pieceJointe }}"> </i> Télécharger
                            </a>
                        </div>

                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
