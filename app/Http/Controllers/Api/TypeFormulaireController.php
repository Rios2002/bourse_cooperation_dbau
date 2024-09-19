<?php

namespace App\Http\Controllers\Api;

use App\Models\TypeFormulaire;
use Illuminate\Http\Request;
use App\Http\Requests\TypeFormulaireRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\TypeFormulaireResource;

class TypeFormulaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $typeFormulaires = TypeFormulaire::paginate();

        return TypeFormulaireResource::collection($typeFormulaires);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeFormulaireRequest $request): TypeFormulaire
    {
        return TypeFormulaire::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeFormulaire $typeFormulaire): TypeFormulaire
    {
        return $typeFormulaire;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeFormulaireRequest $request, TypeFormulaire $typeFormulaire): TypeFormulaire
    {
        $typeFormulaire->update($request->validated());

        return $typeFormulaire;
    }

    public function destroy(TypeFormulaire $typeFormulaire): Response
    {
        $typeFormulaire->delete();

        return response()->noContent();
    }
}
