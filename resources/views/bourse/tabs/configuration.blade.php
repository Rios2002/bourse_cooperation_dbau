<div role="tabpanel" class="tab-pane fade active show" id="tabConfig" aria-labelledby="active-tab">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-end">
                        <a href="{{ route('bourses.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                    </div>
                    <div class="row align-items-center ">

                        <div class="col-lg-9">
                            <div class="btn-group  w-100 " style="margin-bottom: 0;">
                                <button type="button"
                                    class="btn w-100
                                    @if ($bourse->estActif()) bg-primary-subtle text-primary @else bg-danger-subtle text-danger @endif
                                     rounded-05">
                                    @if ($bourse->estActif())
                                        <i class="fa fa-check-circle me-2"></i> Cette Bourse est Active
                                        Actuellement,
                                        l'inscription à cette bourse est disponible
                                    @else
                                        <i class="fa fa-times-circle me-2"></i> Cette Bourse est Inactive
                                        Actuellement,
                                        l'inscription à cette bourse n'est pas disponible
                                    @endif

                                </button>
                                <button type="button"
                                    class="btn @if ($bourse->estActif()) bg-primary-subtle text-primary @else bg-danger-subtle text-danger @endif dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" style="">
                                    <li>
                                        @if ($bourse->estActif())
                                            <a class="dropdown-item"
                                                href="{{ route('bourses.toggle_publish', $bourse->id) }}">

                                                <i class="fa fa-close text-danger me-2"></i>
                                                Dépublier </a>
                                        @else
                                            <a class="dropdown-item"
                                                href="{{ route('bourses.toggle_publish', $bourse->id) }}">
                                                <i class="fa fa-check text-success me-2"></i>

                                                Publier </a>
                                        @endif
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <a href="{{ asset($bourse->Communique) }}" target="_blank"
                                class="btn btn btn-light rounded-05 my-3 text-nowrap w-100"><i
                                    class="fa fa-pdf-file"></i>
                                <i class="fa fa-download me-2"></i>
                                Voir le
                                communiqué</a>
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
                        <section id="SectionDiplome"></section>
                        @include('bourse.show-partials.diplome-de-base-form')
                        <hr class="my-5" id="SectionPieceJointe">
                        @include('bourse.show-partials.piece-jointe-form')

                        <hr class="my-5" id="SectionFiliere">

                        @include('bourse.show-partials.filiere-bourse-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
