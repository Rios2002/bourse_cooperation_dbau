<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FiliereRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $filieres = Filiere::paginate();

        return view('filiere.index', compact('filieres'))
            ->with('i', ($request->input('page', 1) - 1) * $filieres->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $filiere = new Filiere();

        return view('filiere.create', compact('filiere'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FiliereRequest $request): RedirectResponse
    {
        $all = $request->validated();
        Filiere::create($all);

        return Redirect::route('filieres.index')
            ->with('success', 'Filiere a été créé(e) avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $filiere = Filiere::findOrFail($id);

        return view('filiere.show', compact('filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $filiere = Filiere::findOrFail($id);

        return view('filiere.edit', compact('filiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FiliereRequest $request, Filiere $filiere): RedirectResponse
    {
        $all=$request->validated();
        $filiere->update($all);

        return Redirect::route('filieres.index')
            ->with('success', 'Filiere a été mis(e) à jour avec succes !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = Filiere::findOrFail($id);

        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du Filiere !" . $th->getMessage()]);
        }


        return Redirect::route('filieres.index')
            ->with('success', 'Filiere a été supprimé(e) avec succes !');
    }
}
