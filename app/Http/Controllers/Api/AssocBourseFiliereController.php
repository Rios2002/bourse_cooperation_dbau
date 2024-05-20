<?php

namespace App\Http\Controllers\Api;

use App\Models\AssocBourseFiliere;
use Illuminate\Http\Request;
use App\Http\Requests\AssocBourseFiliereRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssocBourseFiliereResource;

class AssocBourseFiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $assocBourseFilieres = AssocBourseFiliere::paginate();

        return AssocBourseFiliereResource::collection($assocBourseFilieres);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssocBourseFiliereRequest $request): AssocBourseFiliere
    {
        return AssocBourseFiliere::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(AssocBourseFiliere $assocBourseFiliere): AssocBourseFiliere
    {
        return $assocBourseFiliere;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssocBourseFiliereRequest $request, AssocBourseFiliere $assocBourseFiliere): AssocBourseFiliere
    {
        $assocBourseFiliere->update($request->validated());

        return $assocBourseFiliere;
    }

    public function destroy(AssocBourseFiliere $assocBourseFiliere): Response
    {
        $assocBourseFiliere->delete();

        return response()->noContent();
    }
}
