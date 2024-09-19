@foreach ($champFormulaires as $champFormulaire)
    <div class="modal fade" id="modalPreview{{ $champFormulaire->id }}" tabindex="-1"
        aria-labelledby="modalPreview{{ $champFormulaire->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPreview{{ $champFormulaire->id }}Label">Prévisualisation du champ
                        "{{ $champFormulaire->LibelleChamp }}"</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>
                <div class="modal-body">
                    @include('champ-formulaire.show')
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="table-responsive">
    <table class="table table-striped table-hover datatable">
        <thead class="thead">
            <tr>
                <th>N°</th>


                <th>Type Champ</th>
                <th>Libellé / Question</th>

                <th>Obligatoire</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($champFormulaires as $champFormulaire)
                <tr>
                    <td>{{ $loop->iteration }}</td>


                    <td>{{ $champFormulaire->CodeTypeChamp }}</td>
                    <td>{{ $champFormulaire->LibelleChamp }}</td>

                    <td>
                        @if ($champFormulaire->isRequired == 1)
                            <span class="badge bg-success">Oui</span>
                        @else
                            <span class="badge bg-danger">Non</span>
                        @endif
                    </td>

                    <td>
                        <div class="dropdown dropstart">
                            <a href="javascript:void(0)" class="text-muted show" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="true">
                                <i class="ti ti-dots-vertical fs-5"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-20px, 1.6px, 0px);"
                                data-popper-placement="left-start">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-3" data-bs-toggle="modal"
                                        data-bs-target="#modalPreview{{ $champFormulaire->id }}" href="">
                                        <i class="fs-4 ti ti-eye"></i> Prévisualiser
                                    </a>
                                </li>
                                {{-- <li>
                                    <a class="dropdown-item d-flex align-items-center gap-3"
                                        href="{{ route('champ-formulaires.edit', $champFormulaire->id) }}">
                                        <i class="fs-4 ti ti-edit"></i> Modifier
                                    </a>
                                </li> --}}
                                <li>
                                    <form action="{{ route('champ-formulaires.destroy', $champFormulaire->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fs-4 ti ti-trash"></i> {{ __('Supprimer') }}
                                        </button>
                                    </form>

                                </li>
                            </ul>
                        </div>
                        {{--
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="{{ route('champ-formulaires.show',$champFormulaire->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Détails') }}</a>
                                                            <a class="dropdown-item" href="{{ route('champ-formulaires.edit',$champFormulaire->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                            <div class="dropdown-divider"></div>
                                                            <form action="{{ route('champ-formulaires.destroy',$champFormulaire->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger"><i class="fa fa-fw fa-trash"></i> {{ __('Supprimer') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                --}}
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
