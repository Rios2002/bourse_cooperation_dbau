<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DemandeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $demandes = Demande::paginate();

        return view('demande.index', compact('demandes'))
            ->with('i', ($request->input('page', 1) - 1) * $demandes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $demande = new Demande();

        return view('demande.create', compact('demande'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DemandeRequest $request): RedirectResponse
    {
        $all = $request->validated();
        Demande::create($all);

        return Redirect::route('demandes.index')
            ->with('success', 'Demande a été créé(e) avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $demande = Demande::findOrFail($id);

        return view('demande.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $demande = Demande::findOrFail($id);

        return view('demande.edit', compact('demande'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DemandeRequest $request, Demande $demande): RedirectResponse
    {
        $all=$request->validated();
        $demande->update($all);

        return Redirect::route('demandes.index')
            ->with('success', 'Demande a été mis(e) à jour avec succes !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = Demande::findOrFail($id);

        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du Demande !" . $th->getMessage()]);
        }


        return Redirect::route('demandes.index')
            ->with('success', 'Demande a été supprimé(e) avec succes !');
    }
}
