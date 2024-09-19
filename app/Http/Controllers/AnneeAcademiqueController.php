<?php

namespace App\Http\Controllers;

use App\Models\AnneeAcademique;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AnneeAcademiqueRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AnneeAcademiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $anneeAcademiques = AnneeAcademique::paginate();

        return view('annee-academique.index', compact('anneeAcademiques'))
            ->with('i', ($request->input('page', 1) - 1) * $anneeAcademiques->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $anneeAcademique = new AnneeAcademique();

        return view('annee-academique.create', compact('anneeAcademique'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnneeAcademiqueRequest $request): RedirectResponse
    {
        $all = $request->validated();
        $all["CodeAnneeAcademique"] = $all["AnneeDebut"] . "-" . intval($all["AnneeDebut"]) + 1;
        $all["LibelleAnneeAcademique"] = $all["AnneeDebut"] . " - " . intval($all["AnneeDebut"]) + 1;
        AnneeAcademique::create($all);

        return Redirect::route('annee-academiques.index')
            ->with('success', 'AnneeAcademique a été créé(e) avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $anneeAcademique = AnneeAcademique::findOrFail($id);

        return view('annee-academique.show', compact('anneeAcademique'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $anneeAcademique = AnneeAcademique::findOrFail($id);

        return view('annee-academique.edit', compact('anneeAcademique'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnneeAcademiqueRequest $request, AnneeAcademique $anneeAcademique): RedirectResponse
    {
        $all = $request->validated();
        $all["CodeAnneeAcademique"] = $all["AnneeDebut"] . "-" . intval($all["AnneeDebut"]) + 1;
        $all["LibelleAnneeAcademique"] = $all["AnneeDebut"] . " - " . intval($all["AnneeDebut"]) + 1;
        $anneeAcademique->update($all);

        return Redirect::route('annee-academiques.index')
            ->with('success', 'AnneeAcademique a été mis(e) à jour avec succes !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = AnneeAcademique::findOrFail($id);

        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du AnneeAcademique !" . $th->getMessage()]);
        }


        return Redirect::route('annee-academiques.index')
            ->with('success', 'AnneeAcademique a été supprimé(e) avec succes !');
    }
}
