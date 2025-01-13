<?php

namespace App\Http\Controllers;

use App\Models\Bourse;
use App\Models\Demande;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
// use Spatie\LaravelPdf\Facades\Pdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Requests\DemandeRequest;
use App\Models\AssocDemandePieceJointe;
use App\Models\Formulaire;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    function bourse_disponible()
    {


        $bourses = Bourse::disponibles()->get();
        // $bourses = Bourse::where("isDisponible", true)->where("DateOuverture", '>=', DB::raw("now"))->where("DateFermeture", "<=", DB::raw("now"))->get();
        return view('bourse-disponible.home', compact('bourses'));
    }
    function postuler(Bourse $bourse)
    {
        $mesDemandesDeLaBourse = $bourse->demandes()->where("user_id", auth()->id())->get();
        return view('bourse-disponible.postuler', compact('bourse', 'mesDemandesDeLaBourse'));
    }

    function processPostuler(Bourse $bourse, Request $request)
    {
        $demande = null;
        if (!$bourse->estActif()) {
            return Redirect::route('bourses-disponible')
                ->withErrors("Cette bourse n'est pas disponible pour le moment");
        }

        $olddmd = Demande::where("user_id", auth()->id())->where("bourse_id", $bourse->id)->first();
        if ($request->has('start')  && !is_null($olddmd) && $olddmd->currentStep() == 1) {
            return Redirect::route('bourses-postuler-process', [$bourse->id, "reference" => $olddmd->Code])
                ->withErrors("Vous n'aviez pas encore terminé votre demande précédente, veuillez la terminer avant de continuer");
        } elseif ($request->has('start')) {
            $demande = Demande::create([
                "user_id" => auth()->id(),
                "bourse_id" => $bourse->id,
                "Code" => Demande::generateCode()
            ]);
            return Redirect::route('bourses-postuler-process', [$bourse->id, "reference" => $demande->Code]);
        } elseif ($request->has('reference')) {
            $demande = Demande::where("user_id", auth()->id())->where("bourse_id", $bourse->id)
                ->where("Code", $request->reference);

            if ($demande->exists()) {
                $demande = $demande->first();
            } else {
                $demande = null;
            }
        }
        if (is_null($demande)) {
            return Redirect::route('bourses-disponible')
                ->withErrors("Une erreur s'est produite, veuillez réessayer");
        }


        $forms = $bourse->formulaires();

        $currentStep = $demande->currentStep();


        $StaticSteps = Demande::$static_steps;

        $diplomes = $bourse->diplomes()->get();
        $cycles = $bourse->cycles()->get();
        $filieresBourses = $bourse->filieres()->get();
        $piecesJointes = $demande->piecesJointes()->get();


        // if (in_array($currentStep, array_keys(Demande::$static_steps))) {
        // }
        return view('bourse-disponible.formulaire-statique.index', compact('demande', 'bourse', 'StaticSteps', 'currentStep', 'diplomes', 'cycles', 'filieresBourses', 'piecesJointes', 'forms'));
    }

    function processPostulerPost(Bourse $bourse, $demande_id, $step, Request $request)
    {
        if (!$bourse->estActif()) {
            return Redirect::route('bourses-disponible')
                ->withErrors("Cette bourse n'est pas disponible pour le moment");
        }
        $rules = Demande::$static_steps[$step]["rules"];
        $all = $request->all();
        $request->validate($rules);


        $demande = Demande::where("user_id", auth()->id())->where("bourse_id", $bourse->id)
            ->where("id", $demande_id)->first();


        if (is_null($demande)) {
            return Redirect::route('bourses-disponible')
                ->withErrors("Une erreur s'est produite, veuillez réessayer");
        }
        if ($demande->Imprime) {
            return Redirect::route('bourses-postuler-process', [$bourse->id, "reference" => $demande->Code])
                ->withErrors("Vous ne pouvez plus modifier votre demande, elle a déjà été imprimée");
        }
        if ($step == 4 && $request->hasFile('pieceJointe') && $request->has("pieceJointeID")) {
            AssocDemandePieceJointe::create([
                "demande_id" => $demande->id,
                "piece_jointe_id" => $request->pieceJointeID,
                "url" => Storage::url($request->file("pieceJointe")->store("piece_jointes", "public"))
            ]);
            return Redirect::route('bourses-postuler-process', [$bourse->id, "reference" => $demande->Code]);
        }

        $demande->update($all);
        if (!is_null($demande->CodeDiplome)) {
            $demande->update(['CycleSollicite' => $demande->DiplomeDeBase->CycleCible]);
        }
        $all["FiliereManuel"] = $demande->doitSaisirFiliere();
        if ($demande->doitSaisirFiliere()) {
            $demande->update(['filiere_id' => null]);
        } elseif (!is_null($demande->filiere_id)) {
            $demande->update(['LibelleFiliere' => $demande->Filiere()->first()->LibelleFiliere]);
        }

        return Redirect::route('bourses-postuler-process', [$bourse->id, "reference" => $demande->Code]);
    }
    function processPostFormCostum(Bourse $bourse, $demande_id, Request $request)
    {

        request()->validate([
            "formulaire_id" => "required",
        ]);
        if (!$bourse->estActif()) {
            return Redirect::route('bourses-disponible')
                ->withErrors("Cette bourse n'est pas disponible pour le moment");
        }

        if (!$bourse->CheckFormExists($request->formulaire_id)) {
            return redirect()->back()
                ->withErrors("Ce formulaire n'est pas disponible pour cette bourse");
        }
        $demande = Demande::where("user_id", auth()->id())->where("bourse_id", $bourse->id)
            ->where("id", $demande_id)->first();

        if (is_null($demande)) {
            return Redirect::route('bourses-disponible')
                ->withErrors("Une erreur s'est produite, veuillez réessayer");
        }
        if ($demande->Imprime) {
            return Redirect::route('bourses-postuler-process', [$bourse->id, "reference" => $demande->Code])
                ->withErrors("Vous ne pouvez plus modifier votre demande, elle a déjà été imprimée");
        }

        $form = Formulaire::findOrFail($request->formulaire_id);
        $rules = $form->rules();
        $request->validate($rules);
        $all = $request->all();
        $form->storeData($all, $demande->id);
        return Redirect::route('bourses-postuler-process', [$bourse->id, "reference" => $demande->Code]);
    }

    function generatePDF(Bourse $bourse, $demande_id)
    {
        if (auth()->user()->hasRole("Super-admin")) {
            $demande = Demande::where("bourse_id", $bourse->id)
                ->where("id", $demande_id)->first();
        } else {
            $demande = Demande::where("user_id", auth()->id())->where("bourse_id", $bourse->id)
                ->where("id", $demande_id)->first();
        }
        if (is_null($demande)) {
            return Redirect::route('bourses-disponible')
                ->withErrors("Une erreur s'est produite, veuillez réessayer");
        }
        $demande->update(['imprime' => true]);

        PDF::setOptions([
            "isHtml5ParserEnabled" => true,
            "isRemoteEnabled" => true,
            "defaultPaperSize" => "a4",
            "dpi" => 130
        ]);


        $pdf = PDF::loadView('pdfs.fiche-incription', compact('demande', 'bourse'));

        return $pdf->download('pdf_file.pdf');
        // return view('pdfs.invoice', compact('demande', 'bourse'));
        return Pdf::view('pdfs.fiche-incription', compact('demande', 'bourse'))
            ->format('a4')
            ->name('fiche_incription.pdf');
    }
    function deleteFile(Bourse $bourse, $demande_id, $pj_id)
    {
        $demande = Demande::where("user_id", auth()->id())->where("bourse_id", $bourse->id)
            ->where("id", $demande_id)->first();
        if (is_null($demande)) {
            return Redirect::route('bourses-disponible')
                ->withErrors("Une erreur s'est produite, veuillez réessayer");
        }
        if ($demande->Imprime) {
            return Redirect::route('bourses-postuler-process', [$bourse->id, "reference" => $demande->Code])
                ->withErrors("Vous ne pouvez plus modifier votre demande, elle a déjà été imprimée");
        }

        $assoc = AssocDemandePieceJointe::where("demande_id", $demande->id)->where("piece_jointe_id", $pj_id)->first();
        if (!is_null($assoc)) {
            Storage::delete($assoc->url);
            $assoc->delete();
        }
        return Redirect::route('bourses-postuler-process', [$bourse->id, "reference" => $demande->Code]);
    }
}
