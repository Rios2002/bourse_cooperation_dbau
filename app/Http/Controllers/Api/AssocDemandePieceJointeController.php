<?php

namespace App\Http\Controllers\Api;

use App\Models\AssocDemandePieceJointe;
use Illuminate\Http\Request;
use App\Http\Requests\AssocDemandePieceJointeRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssocDemandePieceJointeResource;

class AssocDemandePieceJointeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $assocDemandePieceJointes = AssocDemandePieceJointe::paginate();

        return AssocDemandePieceJointeResource::collection($assocDemandePieceJointes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssocDemandePieceJointeRequest $request): AssocDemandePieceJointe
    {
        return AssocDemandePieceJointe::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(AssocDemandePieceJointe $assocDemandePieceJointe): AssocDemandePieceJointe
    {
        return $assocDemandePieceJointe;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssocDemandePieceJointeRequest $request, AssocDemandePieceJointe $assocDemandePieceJointe): AssocDemandePieceJointe
    {
        $assocDemandePieceJointe->update($request->validated());

        return $assocDemandePieceJointe;
    }

    public function destroy(AssocDemandePieceJointe $assocDemandePieceJointe): Response
    {
        $assocDemandePieceJointe->delete();

        return response()->noContent();
    }
}
