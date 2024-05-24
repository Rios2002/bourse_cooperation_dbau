<?php

namespace App\Models;

use App\Models\TypeFormulaire;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Formulaire
 *
 * @property $id
 * @property $CodeTypeFormulaire
 * @property $Titre
 * @property $Description
 * @property $created_at
 * @property $updated_at
 *
 * @property CoopTypeFormulaire $coopTypeFormulaire
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Formulaire extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['CodeTypeFormulaire', 'Titre', 'Description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeFormulaire()
    {
        return $this->belongsTo(TypeFormulaire::class, 'CodeTypeFormulaire', 'CodeTypeFormulaire');
    }

    public function champFormulaires()
    {
        return $this->hasMany(ChampFormulaire::class, 'formulaire_id', 'id');
    }

    function rules()
    {
        $champs = $this->champFormulaires()->get();
        $rules = [];
        foreach ($champs as $champ) {
            $rules[$champ->getName()] = $champ->rules();
        }
        return $rules;
    }
    function storeData($saisi, $demande_id)
    {
        $champs = $this->champFormulaires()->get();

        foreach ($champs as $champ) {
            $valsaisi = $saisi['form_' . $this->id . '_champ_' . $champ->id] ?? null;
            AssocChampDemande::updateOrCreate(
                [
                    "demande_id" => $demande_id,
                    "champ_formulaire_id" => $champ->id
                ],
                [
                    "demande_id" => $demande_id,
                    "champ_formulaire_id" => $champ->id,
                    "Saisi" => $valsaisi
                ]
            );
        }
    }

    function stepCompleted($demande_id)
    {
        $restant = $this->champFormulaires()->where('isRequired', true)->whereNotIn(
            "id",
            AssocChampDemande::where('demande_id', $demande_id)->pluck("champ_formulaire_id")
        );
        if ($restant->count() > 0) {
            return false;
        }
        return true;
    }
}
