<?php

namespace App\Http\Controllers\Api;

use App\Models\AssocBoursFormulaire;
use Illuminate\Http\Request;
use App\Http\Requests\AssocBoursFormulaireRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssocBoursFormulaireResource;

class AssocBoursFormulaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $assocBoursFormulaires = AssocBoursFormulaire::paginate();

        return AssocBoursFormulaireResource::collection($assocBoursFormulaires);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssocBoursFormulaireRequest $request): AssocBoursFormulaire
    {
        return AssocBoursFormulaire::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(AssocBoursFormulaire $assocBoursFormulaire): AssocBoursFormulaire
    {
        return $assocBoursFormulaire;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssocBoursFormulaireRequest $request, AssocBoursFormulaire $assocBoursFormulaire): AssocBoursFormulaire
    {
        $assocBoursFormulaire->update($request->validated());

        return $assocBoursFormulaire;
    }

    public function destroy(AssocBoursFormulaire $assocBoursFormulaire): Response
    {
        $assocBoursFormulaire->delete();

        return response()->noContent();
    }
}
