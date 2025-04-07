<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Demande
 *
 * @property $id
 * @property $bourse_id
 * @property $user_id
 * @property $Code
 * @property $NPI
 * @property $Nom
 * @property $Prenom
 * @property $DateNaissance
 * @property $LieuNaissance
 * @property $Sexe
 * @property $CodeDiplome
 * @property $SerieOuFiliereBase
 * @property $AnneeObtention
 * @property $Moyenne
 * @property $Mention
 * @property $CycleSollicite
 * @property $FiliereManuel
 * @property $filiere_id
 * @property $LibelleFiliere
 * @property $StatutAllocataire
 * @property $Contact
 * @property $ContactParent
 * @property $DepotPhysique
 * @property $StatutTraitement
 * @property $Observation
 * @property $created_at
 * @property $updated_at
 *
 * @property Bourse $Bourse
 * @property DiplomeDeBase $DiplomeDeBase
 * @property Cycle $Cycle
 * @property Filiere $Filiere
 * @property User $User
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Demande extends Model
{

    protected $cast = [
        "DateNaissance" => "datetime",
    ];
    protected $perPage = 20;
    protected $casts = [
        'DateNaissance' => 'datetime',
    ];

    static public $static_steps = [
        1 => [
            "title" => "Informations personnel",
            "subtitle" => "Civilité",
            "view" => "bourse-disponible.formulaire-statique.static-form-1",
            "rules" => [
                'NPI' => 'required|numeric|digits_between:8,15',
                'Nom' => 'required|max:255',
                'Prenom' => 'required|max:255',
                'DateNaissance' => 'required|date|before:today',
                'LieuNaissance' => 'required|max:255',
                'Sexe' => 'required|in:M,F',
                'CodeDiplome' => 'required|exists:diplome_de_bases,CodeDiplome',
            ]
        ],
        2 => [
            "title" => "Diplôme de base",
            "subtitle" => "Détails du diplôme",
            "view" => "bourse-disponible.formulaire-statique.static-form-2",
            "rules" => [
                'SerieOuFiliereBase' => 'required|max:255',
                'AnneeObtention' => 'required|numeric|digits:4|min:1900',
                'Moyenne' => 'required|numeric|min:0|max:20',
                'Mention' => 'required|max:255|in:PASSABLE,ASSEZ BIEN,BIEN,TRES BIEN,EXCELLENT,NON MENTIONNÉE',
                // 'CycleSollicite' => 'required|exists:cycles,CodeCycle',
            ]
        ],
        3 => [
            "title" => "Filière de formation",
            "subtitle" => "Niveau , Cycle et filière sollicité",
            "view" => "bourse-disponible.formulaire-statique.static-form-3",
            "rules" => [

                // 'filiere_id' => 'required|exists:filieres,id',
                // 'LibelleFiliere' => 'nullable|max:255',
                'StatutAllocataire' => 'required|in:OUI,NON',
                'Contact' => 'required|max:255',
                'ContactParent' => 'required|max:255',
                // 'DepotPhysique' => 'required|in:O,N',
                // 'StatutTraitement' => 'required|in:EN ATTENTE DE FINALISATION,EN COURS DE TRAITEMENT,TRAITE',
                // 'Observation' => 'required|max:255',
            ]
        ],
        4 => [
            "title" => "Pièces jointes",
            "subtitle" => "Documents à fournir",
            "view" => "bourse-disponible.formulaire-statique.static-form-4",
            "rules" => [
                "pieceJointeID" => "required|exists:piece_jointes,id",
                "pieceJointe" => "required|file|mimes:pdf,jpg,jpeg,png|max:2048"
            ]
        ],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['bourse_id', 'user_id', 'Code', 'NPI', 'Nom', 'Prenom', 'DateNaissance', 'LieuNaissance', 'Sexe', 'CodeDiplome', 'SerieOuFiliereBase', 'AnneeObtention', 'Moyenne', 'Mention', 'CycleSollicite', 'FiliereManuel', 'filiere_id', 'LibelleFiliere', 'StatutAllocataire', 'Contact', 'ContactParent', 'DepotPhysique', 'StatutTraitement', 'Observation', "imprime"];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Bourse()
    {
        return $this->belongsTo(Bourse::class, 'bourse_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function DiplomeDeBase()
    {
        return $this->belongsTo(DiplomeDeBase::class, 'CodeDiplome', 'CodeDiplome');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Cycle()
    {
        return $this->belongsTo(Cycle::class, 'CycleSollicite', 'CodeCycle');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Filiere()
    {
        return $this->belongsTo(Filiere::class, 'filiere_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    static function getSteps()
    {
        return [
            1 => [
                'NPI',
                'Nom',
                'Prenom',
                'DateNaissance',
                'LieuNaissance',
                'Sexe',
                'CodeDiplome'
            ],
            2 => [
                'SerieOuFiliereBase',
                'AnneeObtention',
                'Moyenne',
                'Mention',
                'CycleSollicite'
            ],
            3 => [
                'LibelleFiliere',
                'StatutAllocataire',
                'Contact',
                'ContactParent'
            ]
        ];
    }
    function currentStep()
    {
        $step = 1;
        foreach (self::getSteps() as $key => $value) {
            $step = $key;
            foreach ($value as $item) {
                if (is_null($this->$item)) {
                    return $step;
                }
            }
        }
        $step++;
        $reste = $this->piecesJointes()->whereNotIn('id', $this->hasMany(AssocDemandePieceJointe::class, 'demande_id', 'id')->pluck('piece_jointe_id'));

        if ($reste->count() == 0) {
            $step++;
        }

        $forms = $this->Bourse()->first()->formulaires();
        foreach ($forms as $form) {
            if ($form->stepCompleted($this->id)) {
                $step++;
            } else {
                continue;
            }
        }



        return $step;
    }
    static function generateCode()
    {
        while (true) {

            $str = Str::upper(Str::random(12));
            $i = 4;
            while ($i < strlen($str)) {
                $str = substr($str, 0, $i) . '-' . substr($str, $i);
                $i = $i + 5;
            }
            if (!self::where('Code', $str)->exists()) {
                return $str;
            }
        }
    }
    function getStatusTraitement()
    {
        if ($this->currentStep() <= 3) {
            return "EN ATTENTE DE FINALISATION";
        }
        return $this->StatutTraitement;
    }
    function doitSaisirFiliere(): bool
    {
        if ($this->CodeDiplome == null) {
            return false;
        }
        return $this->Bourse()->first()->assocBourseDiplomeDisponible()->where("CodeDiplome", $this->CodeDiplome)->first()->saisirFiliere;
    }
    function piecesJointes()
    {
        return PieceJointe::whereIn(
            'id',
            $this->Bourse()->first()->assocBoursePieceJointes()->where('CodeDiplome', $this->CodeDiplome)->pluck('piece_jointe_id')
        );
    }
    function getPiecesJointesValue()
    {
        return AssocDemandePieceJointe::where('demande_id', $this->id)->join('piece_jointes', 'assoc_demande_piece_jointes.piece_jointe_id', 'piece_jointes.id')->pluck('Libelle', 'url');
    }

    function getPieceJointe($pj_id)
    {
        $pj = $this->hasMany(AssocDemandePieceJointe::class, 'demande_id', 'id')->where('piece_jointe_id', $pj_id);
        if (!$pj->exists()) {
            return null;
        }
        return $pj->first()->url;
    }
    function isCompleted()
    {
        return $this->currentStep() > $this->Bourse()->first()->getStepCount();
    }
    function getChampsComplementaire()
    {
        return AssocChampDemande::where("demande_id", $this->id)->join("champ_formulaires", 'assoc_champ_demandes.champ_formulaire_id', "champ_formulaires.id")->pluck("Saisi", "LibelleChamp");
    }

    function userStr()
    {
        return $this->user()->first()->name . ' ( ' . $this->user()->first()->email . ' , id : ' . $this->user_id . ' )';
    }

    function filieresPossible()
    {
        if ($this->doitSaisirFiliere()) {
            return null;
        }
        if ($this->CodeDiplome == null) {
            return null;
        }
        $cycleCible = $this->DiplomeDeBase->CycleCible;
        $fil_ids = $this->Bourse->assocBourseFilieres()->where("CodeCycle", $cycleCible)->pluck("filiere_id");

        return Filiere::whereIn(
            'id',
            $fil_ids
        )->get();
    }
}
