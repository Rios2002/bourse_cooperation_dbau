@php
    $pagetitle = 'Demande : ' . $demande->Code;
    // $breadcrumbs = ['Ma demande' => route('bourses.index')];
@endphp

@extends('layouts.app')

@section('style')
    <style>
        .nav-tabs .nav-link.active {
            background-color: var(--bs-warning);
            border: none;
            border-radius: 0.5rem;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);
            color: black;
        }
    </style>
@endsection

@section('content')
    @if ($demande->isCompleted())
        <div class="col-12">
            <div class="card ">
                <div class="card-body">
                    {{-- <div class="alert alert-success" role="alert"> --}}
                    <h5 class="alert-heading text-dark ">Félicitations!</h5>
                    <p class="mb-0">Cliquez sur le bouton ci-dessous pour télécharger la fiche de d'inscription </p>
                    <p class="text-danger">
                        <i class="fa fa-warning me-2 "></i> Attention : Plus aucune modification n'est possible
                        après
                        le téléchargement de la fiche
                    </p>
                    <a href="{{ route('bourses-postuler-download', [$bourse->id, $demande->id]) }}"
                        class="btn btn-success rounded-05">
                        <i class="fa fa-download me-2"> </i> Télécharger fiche d'inscription
                    </a>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    @endif

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach ($StaticSteps as $keyStep => $step)
                            <li class="nav-item">
                                <a class="nav-link d-flex @if ($keyStep == $currentStep) active @endif"
                                    data-bs-toggle="tab" href="#paneStep{{ $keyStep }}" role="tab"
                                    @if (!$loop->first && $keyStep > $currentStep) disabled @endif>
                                    <div class="d-flex align-items-center ">
                                        <div class="me-2">
                                            <div
                                                class="btn
                                            @if ($keyStep < $currentStep) btn-primary
                                            @else
                                                btn-secondary @endif
                                            rounded-1 px-3 py-2 fw-bolder ">
                                                {{ $keyStep }}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold ">{{ $step['title'] }} </div>
                                            <div class="text-muted">{{ $step['subtitle'] }}</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach


                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <hr class="my-4">
                        @foreach ($StaticSteps as $keyStep => $step)
                            @php
                                $stepView = $step['view'];
                            @endphp
                            <div class="tab-pane @if ($keyStep == $currentStep) active @endif"
                                id="paneStep{{ $keyStep }}" role="tabpanel">

                                @include($stepView)
                                </form>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
