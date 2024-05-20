<?php

namespace App\Http\Controllers\Api;

use App\Models\AssocBourseDiplomeDisponible;
use Illuminate\Http\Request;
use App\Http\Requests\AssocBourseDiplomeDisponibleRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssocBourseDiplomeDisponibleResource;

class AssocBourseDiplomeDisponibleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $assocBourseDiplomeDisponibles = AssocBourseDiplomeDisponible::paginate();

        return AssocBourseDiplomeDisponibleResource::collection($assocBourseDiplomeDisponibles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssocBourseDiplomeDisponibleRequest $request): AssocBourseDiplomeDisponible
    {
        return AssocBourseDiplomeDisponible::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(AssocBourseDiplomeDisponible $assocBourseDiplomeDisponible): AssocBourseDiplomeDisponible
    {
        return $assocBourseDiplomeDisponible;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssocBourseDiplomeDisponibleRequest $request, AssocBourseDiplomeDisponible $assocBourseDiplomeDisponible): AssocBourseDiplomeDisponible
    {
        $assocBourseDiplomeDisponible->update($request->validated());

        return $assocBourseDiplomeDisponible;
    }

    public function destroy(AssocBourseDiplomeDisponible $assocBourseDiplomeDisponible): Response
    {
        $assocBourseDiplomeDisponible->delete();

        return response()->noContent();
    }
}
