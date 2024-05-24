<?php

namespace App\Http\Controllers\Api;

use App\Models\TypeSorty;
use Illuminate\Http\Request;
use App\Http\Requests\TypeSortyRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\TypeSortyResource;

class TypeSortyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $typeSorties = TypeSorty::paginate();

        return TypeSortyResource::collection($typeSorties);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeSortyRequest $request): TypeSorty
    {
        return TypeSorty::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeSorty $typeSorty): TypeSorty
    {
        return $typeSorty;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeSortyRequest $request, TypeSorty $typeSorty): TypeSorty
    {
        $typeSorty->update($request->validated());

        return $typeSorty;
    }

    public function destroy(TypeSorty $typeSorty): Response
    {
        $typeSorty->delete();

        return response()->noContent();
    }
}
