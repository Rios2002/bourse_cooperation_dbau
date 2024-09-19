<?php

namespace App\Http\Controllers\Api;

use App\Models\AssocAttributChamp;
use Illuminate\Http\Request;
use App\Http\Requests\AssocAttributChampRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssocAttributChampResource;

class AssocAttributChampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $assocAttributChamps = AssocAttributChamp::paginate();

        return AssocAttributChampResource::collection($assocAttributChamps);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssocAttributChampRequest $request): AssocAttributChamp
    {
        return AssocAttributChamp::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(AssocAttributChamp $assocAttributChamp): AssocAttributChamp
    {
        return $assocAttributChamp;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssocAttributChampRequest $request, AssocAttributChamp $assocAttributChamp): AssocAttributChamp
    {
        $assocAttributChamp->update($request->validated());

        return $assocAttributChamp;
    }

    public function destroy(AssocAttributChamp $assocAttributChamp): Response
    {
        $assocAttributChamp->delete();

        return response()->noContent();
    }
}
