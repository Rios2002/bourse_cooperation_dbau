<?php

namespace App\Http\Controllers\Api;

use App\Models\AssocChampDemande;
use Illuminate\Http\Request;
use App\Http\Requests\AssocChampDemandeRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssocChampDemandeResource;

class AssocChampDemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $assocChampDemandes = AssocChampDemande::paginate();

        return AssocChampDemandeResource::collection($assocChampDemandes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssocChampDemandeRequest $request): AssocChampDemande
    {
        return AssocChampDemande::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(AssocChampDemande $assocChampDemande): AssocChampDemande
    {
        return $assocChampDemande;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssocChampDemandeRequest $request, AssocChampDemande $assocChampDemande): AssocChampDemande
    {
        $assocChampDemande->update($request->validated());

        return $assocChampDemande;
    }

    public function destroy(AssocChampDemande $assocChampDemande): Response
    {
        $assocChampDemande->delete();

        return response()->noContent();
    }
}
