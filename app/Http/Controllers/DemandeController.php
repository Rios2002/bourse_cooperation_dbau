<?php

namespace App\Http\Controllers;

use App\Models\Bourse;
use App\Models\Demande;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\DemandeRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $bourse_id = $request->get('bourse_id');
        $search = $request->get('search');
        if ($search) {
            $demandes = Demande::where('Code', "LIKE", "%$search%")
                ->orWhere('Nom', "LIKE", "%$search%")
                ->orWhere('Prenom', "LIKE", "%$search%")
                ->orWhere('NPI', "LIKE", "%$search%")
                ->paginate(100);
        } else {
            $demandes = Demande::where("bourse_id", $bourse_id)->paginate(100);
        }

        $bourses = Bourse::all();


        return view('demande.index', compact('demandes', 'bourses'))
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
    public function update(int $demandeid): RedirectResponse
    {

        $all = request()->validate([

            'Code' => 'string',
            'NPI' => 'string|numeric',
            'Nom' => 'string|max:255',
            'Prenom' => 'string|max:255',
            'LieuNaissance' => 'string|max:255',
            'Sexe' => 'required|string|in:M,F',
            'CodeDiplome' => 'required|exists:diplome_de_bases,CodeDiplome',
            'SerieOuFiliereBase' => 'string',
            'Mention' => 'string',
            'CycleSollicite' => 'required|exists:cycles,CodeCycle',
            'FiliereManuel' => 'required',
            'filiere_id' => 'required',
            'LibelleFiliere' => 'string',
            'StatutAllocataire' => 'string',
            'Contact' => 'string',
            'ContactParent' => 'string',
            // 'DepotPhysique' => 'required',
            // 'StatutTraitement' => 'required|string',
            'Observation' => 'string',
        ]);
        $demande = Demande::findOrFail($demandeid);
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
    function validerDepot(Demande $demande)
    {
        $demande->update(['DepotPhysique' => true]);
        return redirect()->back()
            ->with('success', 'Demande a été validé(e) avec succes !');
    }
}
