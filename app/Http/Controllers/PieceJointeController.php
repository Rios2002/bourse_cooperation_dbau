<?php

namespace App\Http\Controllers;

use App\Models\PieceJointe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PieceJointeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PieceJointeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pieceJointes = PieceJointe::paginate();

        return view('piece-jointe.index', compact('pieceJointes'))
            ->with('i', ($request->input('page', 1) - 1) * $pieceJointes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pieceJointe = new PieceJointe();

        return view('piece-jointe.create', compact('pieceJointe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PieceJointeRequest $request): RedirectResponse
    {
        $all = $request->validated();
        PieceJointe::create($all);

        return Redirect::route('piece-jointes.index')
            ->with('success', 'PieceJointe a été créé(e) avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pieceJointe = PieceJointe::findOrFail($id);

        return view('piece-jointe.show', compact('pieceJointe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pieceJointe = PieceJointe::findOrFail($id);

        return view('piece-jointe.edit', compact('pieceJointe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PieceJointeRequest $request, PieceJointe $pieceJointe): RedirectResponse
    {
        $all=$request->validated();
        $pieceJointe->update($all);

        return Redirect::route('piece-jointes.index')
            ->with('success', 'PieceJointe a été mis(e) à jour avec succes !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = PieceJointe::findOrFail($id);

        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du PieceJointe !" . $th->getMessage()]);
        }


        return Redirect::route('piece-jointes.index')
            ->with('success', 'PieceJointe a été supprimé(e) avec succes !');
    }
}
