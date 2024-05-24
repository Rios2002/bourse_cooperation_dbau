<!-- The Modal -->
<div class="modal fade" id="modalDemande{{ $demande->id }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Détails de la demande : {{ $demande->Code }} </h4>
                <button type="button" class="close btn btn-sm rounded-0  btn-light "
                    data-bs-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @include('demande.show-content')
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>

        </div>
    </div>
</div>
