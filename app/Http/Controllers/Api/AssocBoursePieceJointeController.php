<?php

namespace App\Http\Controllers\Api;

use App\Models\AssocBoursePieceJointe;
use Illuminate\Http\Request;
use App\Http\Requests\AssocBoursePieceJointeRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssocBoursePieceJointeResource;

class AssocBoursePieceJointeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $assocBoursePieceJointes = AssocBoursePieceJointe::paginate();

        return AssocBoursePieceJointeResource::collection($assocBoursePieceJointes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssocBoursePieceJointeRequest $request): AssocBoursePieceJointe
    {
        return AssocBoursePieceJointe::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(AssocBoursePieceJointe $assocBoursePieceJointe): AssocBoursePieceJointe
    {
        return $assocBoursePieceJointe;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssocBoursePieceJointeRequest $request, AssocBoursePieceJointe $assocBoursePieceJointe): AssocBoursePieceJointe
    {
        $assocBoursePieceJointe->update($request->validated());

        return $assocBoursePieceJointe;
    }

    public function destroy(AssocBoursePieceJointe $assocBoursePieceJointe): Response
    {
        $assocBoursePieceJointe->delete();

        return response()->noContent();
    }
}
