<?php

namespace App\Http\Controllers;

use App\Models\TypeChamp;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ChampFormulaire;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ChampFormulaireRequest;
use App\Models\AssocAttributChamp;

class ChampFormulaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $champFormulaires = ChampFormulaire::paginate();

        return view('champ-formulaire.index', compact('champFormulaires'))
            ->with('i', ($request->input('page', 1) - 1) * $champFormulaires->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $champFormulaire = new ChampFormulaire();

        return view('champ-formulaire.create', compact('champFormulaire'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChampFormulaireRequest $request): RedirectResponse
    {
        $all = $request->validated();
        // dd($all);
        $champ = ChampFormulaire::create($all);
        $tc = TypeChamp::find(request()->input('CodeTypeChamp'));
        $compl = $tc->attributTypeChamps()->pluck(DB::raw('CONCAT("attribut_",id)'))->toArray();
        $compl = array_flip($compl);
        $compl = array_intersect_key($all, $compl);
        foreach ($compl as $key => $value) {
            $cp = str_replace('attribut_', '', $key);
            AssocAttributChamp::create([
                'champ_formulaire_id' => $champ->id,
                'attribut_type_champ_id' => $cp,
                'Valeur' => $value,
            ]);
        }


        return redirect()->back()
            ->with('success', 'Le Champs a été créé avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $champFormulaire = ChampFormulaire::findOrFail($id);

        return view('champ-formulaire.show', compact('champFormulaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $champFormulaire = ChampFormulaire::findOrFail($id);

        return view('champ-formulaire.edit', compact('champFormulaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChampFormulaireRequest $request, ChampFormulaire $champFormulaire): RedirectResponse
    {
        $all = $request->validated();
        $champFormulaire->update($all);

        return Redirect::route('champ-formulaires.index')
            ->with('success', 'ChampFormulaire a été mis(e) à jour avec succes !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = ChampFormulaire::findOrFail($id);

        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du ChampFormulaire !" . $th->getMessage()]);
        }


        return redirect()->back()
            ->with('success', 'ChampFormulaire a été supprimé(e) avec succes !');
    }
}
