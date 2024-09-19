<div class="row">
    <div class="col-lg-12">

        <ul class="list-group">
            @foreach ($piecesJointes as $pj)
                {{-- {{ dd($pj) }} --}}
                <li class="list-group-item">
                    <label for="" class="mb-3">
                        @if ($demande->getPieceJointe($pj->id))
                            <i class="fa fa-check text-success me-2 fs-6"></i>
                        @else
                            <i class="fa fa-close text-danger me-2 fs-6"></i>
                        @endif
                        <span class="fw-bold text-dark ">{{ $pj->Libelle }}</span>
                    </label>
                    <br>

                    @if ($demande->getPieceJointe($pj->id))
                        <div class="d-flex">
                            <a href="{{ asset($demande->getPieceJointe($pj->id)) }}"
                                class="btn btn-sm btn-secondary rounded-05 me-3" target="_blank">
                                <i class="fa fa-download me-2"></i>
                                Télécharger
                            </a>
                            @if (!$demande->Imprime)
                                <a href="{{ route('bourses-postuler-deleteFile', [$bourse->id, $demande->id, $pj->id]) }}"
                                    class="btn btn-sm btn-danger rounded-05">
                                    <i class="fa fa-trash me-2"></i>
                                    Supprimer
                                </a>
                            @endif

                        </div>
                    @else
                        <form action="{{ route('bourses-postuler-push', [$bourse->id, $demande->id, $keyStep]) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="pieceJointeID" value="{{ $pj->id }}">

                            <input type="file" name="pieceJointe" accept=".pdf,.png,.jpg,.jpeg"
                                class="form-file form-control rounded-05">
                        </form>
                    @endif
                </li>
            @endforeach

        </ul>
    </div>

</div>
