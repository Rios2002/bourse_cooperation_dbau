<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Cycle;
use App\Models\Bourse;
use App\Models\Filiere;
use Illuminate\View\View;
use App\Models\Formulaire;
use App\Models\PieceJointe;
use Illuminate\Http\Request;
use App\Models\DiplomeDeBase;
use App\Models\AnneeAcademique;
use App\Models\AssocBourseFiliere;
use App\Http\Requests\BourseRequest;
use App\Models\AssocBoursFormulaire;
use Illuminate\Http\RedirectResponse;
use App\Models\AssocBoursePieceJointe;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Models\AssocBourseDiplomeDisponible;

class BourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $bourses = Bourse::paginate();

        return view('bourse.index', compact('bourses'))
            ->with('i', ($request->input('page', 1) - 1) * $bourses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $bourse = new Bourse();
        $pays = Pay::pluck('LibellePays', 'CodePays');
        $anneeAcademiques = AnneeAcademique::orderBy("AnneeDebut", "DESC")->pluck('LibelleAnneeAcademique', 'CodeAnneeAcademique');

        return view('bourse.create', compact('bourse', 'pays', 'anneeAcademiques'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BourseRequest $request): RedirectResponse
    {
        $all = $request->validated();
        if ($request->hasFile('Communique')) {

            $all['Communique'] = Storage::url($request->file('Communique')->store("communiques", "public"));
        }
        Bourse::create($all);

        return Redirect::route('bourses.index')
            ->with('success', 'Bourse a été créé(e) avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $bourse = Bourse::findOrFail($id);
        $diplomes = DiplomeDeBase::pluck("LibelleDiplome", "CodeDiplome");
        $pieceJointes = PieceJointe::pluck("Libelle", "id");
        $cycles = $bourse->cyclePossible()->pluck("LibelleCycle", "CodeCycle");
        $filiers = Filiere::pluck("LibelleFiliere", "id");
        $formulaires = Formulaire::pluck("Titre", "id");



        $boursePJ = $bourse->assocBoursePieceJointes()->get();
        $bourseDiplomes = $bourse->diplomeDeBase()->pluck("CodeDiplome")->toArray();
        $bourseDiplomesObj = $bourse->diplomeDeBase()->get();

        $bourseFiliers = $bourse->assocBourseFilieres()->get();
        $bourseFormulaires = $bourse->formulaires();
        $demandes = $bourse->demandes()->get();


        return view('bourse.show', compact('bourse', 'diplomes', 'bourseDiplomes', 'pieceJointes', 'bourseDiplomesObj', 'boursePJ', 'cycles', 'filiers', 'bourseFiliers', 'formulaires', 'bourseFormulaires', 'demandes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $bourse = Bourse::findOrFail($id);
        $pays = Pay::pluck('LibellePays', 'CodePays');
        $anneeAcademiques = AnneeAcademique::orderBy("AnneeDebut", "DESC")->pluck('LibelleAnneeAcademique', 'CodeAnneeAcademique');



        return view('bourse.edit', compact('bourse', 'pays', 'anneeAcademiques'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BourseRequest $request, Bourse $bourse): RedirectResponse
    {
        $all = $request->validated();
        if ($request->hasFile('Communique')) {
            $all['Communique'] = Storage::url($request->file('Communique')->store("communiques", "public"));
        }
        $bourse->update($all);
        return Redirect::route('bourses.index')
            ->with('success', 'Bourse a été mis(e) à jour avec succes !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = Bourse::findOrFail($id);

        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du Bourse !" . $th->getMessage()]);
        }


        return Redirect::route('bourses.index')
            ->with('success', 'Bourse a été supprimé(e) avec succes !');
    }


    function storeDiplomes(Bourse $bourse)
    {

        request()->validate([
            'CodeDiplome' => 'required|exists:diplome_de_bases,CodeDiplome',
            'saisirFiliere' => 'nullable|in:0,1'
        ]);

        $dip = request()->CodeDiplome;
        $saisi = request()->saisirFiliere ?? false;
        AssocBourseDiplomeDisponible::updateOrCreate([
            'bourse_id' => $bourse->id,
            'CodeDiplome' => $dip,
        ], [
            'bourse_id' => $bourse->id,
            'CodeDiplome' => $dip,
            "saisirFiliere" => $saisi
        ]);

        return Redirect::route('bourses.show', [$bourse->id, "#SectionDiplome"])
            ->with('success', 'Diplomes disponibles pour la bourse ' . $bourse->LibelleBourse . ' ont été mis à jour avec succes !');
    }
    function addPj()
    {
        request()->validate([
            'piece_jointe' => 'required|exists:piece_jointes,id',
            "CodeDiplome" => "required|exists:diplome_de_bases,CodeDiplome"
        ]);
        $bourse = Bourse::findOrFail(request()->bourse);
        request()->validate([
            'CodeDiplome' => 'in:' . implode(',', $bourse->diplomeDeBase()->pluck("CodeDiplome")->toArray(),)
        ]);

        AssocBoursePieceJointe::create([
            'bourse_id' => $bourse->id,
            'piece_jointe_id' => request()->piece_jointe,
            "CodeDiplome" => request()->CodeDiplome
        ]);

        return Redirect::route('bourses.show', [$bourse->id, "#SectionPieceJointe"])
            ->with('success', 'Piece jointe ajoutée avec succes !');
    }
    function deletePj()
    {
        request()->validate([
            'piece_jointe' => 'required|exists:assoc_bourse_piece_jointes,id',
        ]);
        $bourse = Bourse::findOrFail(request()->bourse);
        $assoc = AssocBoursePieceJointe::findOrFail(request()->piece_jointe);
        if ($assoc->bourse_id != $bourse->id) {
            return Redirect::route('bourses.show', $bourse->id)
                ->withErrors('Piece jointe non associée à cette bourse !');
        }
        $assoc->delete();

        return Redirect::route('bourses.show', $bourse->id)
            ->with('success', 'Piece jointe supprimée avec succes !');
    }
    function storeFiliere()
    {
        request()->validate([
            'filiere' => 'required|exists:filieres,id',
            'quota' => 'required|numeric|min:1',
            "CodeCycle" => "required|exists:cycles,CodeCycle"
        ]);
        $bourse = Bourse::findOrFail(request()->bourse);
        $filiere = request()->filiere;
        $quota = request()->quota;
        $cycle = request()->CodeCycle;
        AssocBourseFiliere::updateOrCreate(
            [
                'bourse_id' => $bourse->id,
                'filiere_id' => $filiere,
                'CodeCycle' => $cycle
            ],
            [
                'bourse_id' => $bourse->id,
                'filiere_id' => $filiere,
                'quota' => $quota,
                'CodeCycle' => $cycle
            ]
        );

        return Redirect::route('bourses.show', [$bourse->id, "#SectionFiliere"])
            ->with('success', 'Filiere ajoutée avec succes !');
    }
    function deleteFiliere()
    {
        request()->validate([
            'filiere' => 'required|exists:assoc_bourse_filieres,id',
        ]);
        $bourse = Bourse::findOrFail(request()->bourse);
        $assoc = AssocBourseFiliere::findOrFail(request()->filiere);
        if ($assoc->bourse_id != $bourse->id) {
            return Redirect::route('bourses.show', $bourse->id)
                ->withErrors('Filiere non associée à cette bourse !');
        }
        $assoc->delete();

        return Redirect::route('bourses.show', $bourse->id)
            ->with('success', 'Filiere supprimée avec succes !');
    }
    function destroyDiplome(Bourse $bourse,  $diplomeDeBase)
    {
        $assoc = AssocBourseDiplomeDisponible::where('bourse_id', $bourse->id)->where('CodeDiplome', $diplomeDeBase)->first();
        if (is_null($assoc)) {
            return Redirect::route('bourses.show', $bourse->id)
                ->withErrors('Diplome non associée à cette bourse !');
        }
        $assoc->delete();

        return Redirect::route('bourses.show', $bourse->id)
            ->with('success', 'Diplome supprimée avec succes !');
    }
    function toggle_publish(Bourse $bourse)
    {
        if ($bourse->isPublished) {
            $bourse->update(['isPublished' => false]);
        } else {
            if ($bourse->diplomeDeBase()->count() == 0) {
                return Redirect::route('bourses.show', $bourse->id)
                    ->withErrors('Veuillez ajouter au moins un diplome de base à cette bourse !');
            }
            if ($bourse->assocBourseFilieres()->count() == 0) {
                return Redirect::route('bourses.show', $bourse->id)
                    ->withErrors('Veuillez ajouter au moins une filiere à cette bourse !');
            }
            if ($bourse->assocBoursePieceJointes()->count() == 0) {
                return Redirect::route('bourses.show', $bourse->id)
                    ->withErrors('Veuillez ajouter au moins une piece jointe à cette bourse !');
            }

            $bourse->update(['isPublished' => true]);
        }

        return Redirect::route('bourses.show', $bourse->id)
            ->with('success', 'Publication de la bourse ' . $bourse->LibelleBourse . ' a été mis à jour avec succes !');
    }

    function storeFormulaire()
    {
        request()->validate([
            'formulaire_id' => 'required|exists:formulaires,id',
        ]);
        $bourse = Bourse::findOrFail(request()->bourse);

        AssocBoursFormulaire::updateOrCreate(
            [
                "bourse_id" => $bourse->id,
                "formulaire_id" => request()->formulaire_id
            ],
            [
                "bourse_id" => $bourse->id,
                "formulaire_id" => request()->formulaire_id
            ]
        );
        // $bourse->formulaires()->syncWithoutDetaching([$formulaire]);

        return Redirect::route('bourses.show', [$bourse->id, "#SectionFormulaire"])
            ->with('success', 'Formulaire ajoutée avec succes !');
    }
    function deleteFormulaire($bourse_id)
    {
        request()->validate([
            'formulaire_id' => 'required',
        ]);
        $bourse = Bourse::findOrFail($bourse_id);
        $form = Formulaire::findOrFail(request()->formulaire_id);

        AssocBoursFormulaire::where('bourse_id', $bourse->id)->where('formulaire_id', $form->id)->delete();

        return Redirect::route('bourses.show', $bourse->id)
            ->withErrors('Formulaire non associée à cette bourse !');
    }
}
