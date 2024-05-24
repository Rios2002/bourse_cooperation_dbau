<?php

namespace App\Http\Controllers\Api;

use App\Models\AttributTypeChamp;
use Illuminate\Http\Request;
use App\Http\Requests\AttributTypeChampRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttributTypeChampResource;

class AttributTypeChampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $attributTypeChamps = AttributTypeChamp::paginate();

        return AttributTypeChampResource::collection($attributTypeChamps);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttributTypeChampRequest $request): AttributTypeChamp
    {
        return AttributTypeChamp::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(AttributTypeChamp $attributTypeChamp): AttributTypeChamp
    {
        return $attributTypeChamp;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttributTypeChampRequest $request, AttributTypeChamp $attributTypeChamp): AttributTypeChamp
    {
        $attributTypeChamp->update($request->validated());

        return $attributTypeChamp;
    }

    public function destroy(AttributTypeChamp $attributTypeChamp): Response
    {
        $attributTypeChamp->delete();

        return response()->noContent();
    }
}
