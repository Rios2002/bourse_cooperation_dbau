<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Bourse
 *
 * @property $id
 * @property $CodePays
 * @property $CodeAnneeAcademique
 * @property $LibelleBourse
 * @property $Description
 * @property $Communique
 * @property $isDisponible
 * @property $DateOuverture
 * @property $DateFermeture
 * @property $Quota
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bourse extends Model
{

    protected $perPage = 20;
    protected $stepCount = 4;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'CodePays',
        'CodeAnneeAcademique',
        'LibelleBourse', 'Description', 'Communique', 'isDisponible', 'DateOuverture', 'DateFermeture', 'Quota'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'DateOuverture' => 'datetime',
        'DateFermeture' => 'datetime',
    ];
    /**
     * Get the pays that owns the Bourse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pays(): BelongsTo
    {
        return $this->belongsTo(Pay::class, 'CodePays', 'CodePays');
    }

    /**
     * Get the anneeAcademique that owns the Bourse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function anneeAcademique(): BelongsTo
    {
        return $this->belongsTo(AnneeAcademique::class, 'CodeAnneeAcademique', 'CodeAnneeAcademique');
    }

    /**
     * Get the diplomeDeBase that owns the Bourse
     *

     */
    public function diplomeDeBase()
    {
        return DiplomeDeBase::whereIn('CodeDiplome', $this->assocBourseDiplomeDisponible()->pluck('CodeDiplome'));
    }
    function piece_jointes()
    {
        return PieceJointe::whereIn('id', $this->assocBoursePieceJointes()->pluck('piece_jointe_id'));
    }


    public function assocBourseDiplomeDisponible()
    {
        return $this->hasMany(AssocBourseDiplomeDisponible::class, 'bourse_id', 'id');
    }

    public function assocBoursePieceJointes()
    {
        return $this->hasMany(AssocBoursePieceJointe::class, 'bourse_id', 'id');
    }
    function assocBourseFilieres()
    {
        return $this->hasMany(AssocBourseFiliere::class, 'bourse_id', 'id');
    }

    function cyclePossible()
    {
        return Cycle::whereIn('CodeCycle', $this->diplomeDeBase()->pluck('CycleCible'));
    }
    static function disponibles()
    {
        return  self::where("isDisponible", true)
            ->whereBetween(DB::raw("CURRENT_TIMESTAMP"), [DB::raw("DateOuverture"), DB::raw("DateFermeture")]);
    }
    function demandes()
    {
        return $this->hasMany(Demande::class, 'bourse_id', 'id');
    }
    function periode(): string
    {
        return $this->DateOuverture->format("d/m/Y H:i") . " - " . $this->DateFermeture->format("d/m/Y H:i");
    }
    function diplomes()
    {
        return $this->hasManyThrough(DiplomeDeBase::class, AssocBourseDiplomeDisponible::class, 'bourse_id', 'CodeDiplome', 'id', 'CodeDiplome');
    }
    function filieres()
    {
        return $this->hasManyThrough(Filiere::class, AssocBourseFiliere::class, 'bourse_id', 'id', 'id', 'filiere_id');
    }
    function cycles()
    {
        return $this->cyclePossible();
    }
    function pieceJointes()
    {
        return $this->piece_jointes();
    }
    function getStepCount()
    {
        return $this->stepCount;
    }
    function doitSaisirFiliere($CodeDiplome): bool
    {
        $d = $this->assocBourseDiplomeDisponible()->where("CodeDiplome", $CodeDiplome);
        if ($d->exists()) {
            return $d->first()->saisirFiliere;
        }
        return false;
    }
}
