<?php

namespace App\Http\Controllers;

use App\Models\TypeChamp;
use Illuminate\View\View;
use App\Models\Formulaire;
use Illuminate\Http\Request;
use App\Models\TypeFormulaire;
use App\Models\ChampFormulaire;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FormulaireRequest;
use App\Models\AttributTypeChamp;
use Illuminate\Support\Facades\Redirect;

class FormulaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $formulaires = Formulaire::paginate();

        return view('formulaire.index', compact('formulaires'))
            ->with('i', ($request->input('page', 1) - 1) * $formulaires->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $formulaire = new Formulaire();
        $types = TypeFormulaire::pluck("LibelleTypeFormulaire", "CodeTypeFormulaire")->toArray();

        return view('formulaire.create', compact('formulaire', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormulaireRequest $request): RedirectResponse
    {
        $all = $request->validated();
        Formulaire::create($all);

        return Redirect::route('formulaires.index')
            ->with('success', 'Formulaire a été créé(e) avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $formulaire = Formulaire::findOrFail($id);
        $champFormulaire = new ChampFormulaire();
        $typesTC =  TypeChamp::pluck(DB::raw("CONCAT(CodeTypeChamp,' | ', LibelleTypeChamp)"), "CodeTypeChamp")->toArray();
        $attributs = AttributTypeChamp::all();

        $champFormulaires = $formulaire->champFormulaires()->get();
        return view('formulaire.show', compact('formulaire', 'champFormulaire', 'typesTC', 'attributs', 'champFormulaires'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $formulaire = Formulaire::findOrFail($id);
        $types = TypeFormulaire::pluck("LibelleTypeFormulaire", "CodeTypeFormulaire")->toArray();


        return view('formulaire.edit', compact('formulaire', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormulaireRequest $request, Formulaire $formulaire): RedirectResponse
    {
        $all = $request->validated();
        $formulaire->update($all);

        return Redirect::route('formulaires.index')
            ->with('success', 'Formulaire a été mis(e) à jour avec succes !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = Formulaire::findOrFail($id);

        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du Formulaire !" . $th->getMessage()]);
        }


        return Redirect::route('formulaires.index')
            ->with('success', 'Formulaire a été supprimé(e) avec succes !');
    }
}
